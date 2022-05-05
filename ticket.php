<?php
  require 'admin/db_connect.php';

  require_once $_SERVER['DOCUMENT_ROOT'].'\flighht\admin\admin_class.php';

   
  $objectPdo = new PDO('mysql:host=localhost;dbname=flight_booking_db', 'root', '');
 /* $pdoStat = $objectPdo->prepare('SELECT id ,flight_id,name,address,contact FROM booked_flight ORDER BY contact ASC ');*/
 $pdoStat = $objectPdo->prepare('SELECT b.*,f.*,a.airlines,a.logo_path,b.id as bid FROM  booked_flight b  inner join flight_list f on f.id = b.flight_id inner join airlines_list a on f.airline_id = a.id WHERE b.id=$i order by b.id desc ') ;
  $executeIsOK = $pdoStat->execute();
  $liste= $pdoStat->fetchAll();
   /* $this->qrpr();
   $ProduitCQR=new ProduitC();*/
 ?>

<body  onload="window.print();">
                   <?php
						
						$pdo= config::getConnexion();
							$airport = $pdo->query("SELECT * FROM airport_list ");
							while($row = $airport->fetch(PDO::FETCH_ASSOC)){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$i=7;
							$qry = $pdo->query("SELECT b.*,f.*,a.airlines,a.logo_path,b.id as bid FROM  booked_flight b  inner join flight_list f on f.id = b.flight_id inner join airlines_list a on f.airline_id = a.id WHERE b.id=$i order by b.id desc ");
							while($row = $qry->fetch(PDO::FETCH_ASSOC)):

						 ?>
	<div class="wrapper">
		<div class="ticket-one">
			<div class="main-pass">
				<div class="flight-heading">
					<div class="blanks"></div>
					<div class="fheading">
						<h3><?php echo $row['airlines'] ?></h3>
						    <h2>BOARDING PASS</h2>
					</div>
				</div>
				<div class="main-flight-details">
					<div class="margin-color-code">
						<div class="barcode-container">
                        <?php 
							 require_once('phpqrcode/qrlib.php'); 
							 $qrvalue =$row['name'].$row['plane_no'].$row['departure_airport_id'] ;
			
			                  $tempDir = "pdfqrcodes/"; 
			                   $codeContents = $qrvalue; 
			                 $fileName = $qrvalue . '.png'; 
			                      $pngAbsoluteFilePath = $tempDir.$fileName; 
			             $urlRelativeFilePath = $tempDir.$fileName; 
			              if (!file_exists($pngAbsoluteFilePath)) { 
				            QRcode::png($codeContents, $pngAbsoluteFilePath); 
			                    }
								$datasaya =null;
								$datasaya .= "<td><img src='pdfqrcodes/" .$row["name"]. "" .$row["plane_no"]. "" .$row["departure_airport_id"].".png' width='150px'></td>" ;
								echo  $datasaya  ;
			                      ?>
						</div>
						<div class="mfbtime">
							<p><?php echo $row['plane_no'] ?></p>
						</div>
					</div>
					<div class="mf-details">
						<div class="mf-stampc">
							<div class="mftravelstamp">
								
								<p>&#9733;<?php echo $aname[$row['departure_airport_id']]?>&#9733;</p>
							</div>
							<div class="mfsecuritystamp">
								<p>AVIATION SECURITY</p>
								<p style="color:rgb(41, 123, 41);">checked</p>

							</div>
						</div>

						<div class="pdetails">
							<div class="pname">
								<p>passenger</p>
								<p><?php echo $row['name'] ?></p>
							</div>
							<div class="pfrom">
								<p>From</p>
								<p></p>
							</div>
							<div class="pto">
								<p></p>
								<p></p>
							</div>
						</div>
						<div class="passdetails">
							<div class="passgate">
								<p>Gate</p>
								<p>04</p>
							</div>
							<div class="passflight">
								<p>Flight</p>
								<p><?php echo $row['plane_no'] ?></p>
							</div>
							<div class="passdate">
								<p>Date</p>
								<p>18/05/22</p>
							</div>
							<div class="passseat">
								<p>Seat</p>
								<p>07</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="counter-pass">
				<div class="cpboardingstampc">
					<div class="boardingstamp">
						<p>boarded</p>
						<p><?php echo date(' h:i A',strtotime($row['arrival_datetime'])) ?></p>
					</div>
				</div>
				<h3><?php echo $row['airlines'] ?></h3>
				<div class="cpassname">
					<p>Name of passenger</p>
					<p><?php echo $row['name'] ?></p>
				</div>
				<div class="cpassfrom">
					<p>From</p>
					<p><?php echo $aname[$row['departure_airport_id']]?></p>
				</div>
				<div class="cpassto">
					<p>TO</p>
					<p><?php echo $aname[$row['arrival_airport_id']]?></p>
				</div>
				<div class="cpassdetails">
					<div class="cpass">
						<p>Gate</p>
						<p>04</p>
					</div>
					<div class="cpass">
						<p>Date</p>
						<p>18/05/22</p>
					</div>
					<div class="cpass">
						<p>Flight</p>
						<p><?php echo $row['plane_no'] ?></p>
					</div>
				</div>
				<div class="cpassimp">
					<div class="cpassimp1">
						<p>Boarding time</p>
						<p><?php echo date(' h:i A',strtotime($row['departure_datetime'])) ?></p>
					</div>
					<div class="cpassimpseat">
						<p>Seat</p>
						<p>07</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php endwhile; ?>
</body>
	
    	
 

<style>
    @import url("https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Saira+Stencil+One&family=Stardos+Stencil&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400&family=Roboto+Mono:wght@400;600&display=swap");

:root {
	--blue: rgb(0, 53, 151);
	--aqua: rgb(98, 192, 161);
	--lightaqua: rgb(222, 255, 248);
	--red: crimson;
	--redstamp: rgb(170, 52, 76);
	--lightbluestamp: rgb(35, 67, 192);
	--bluestamp: rgb(20, 50, 220);
}
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	background-color: var(--aqua);
}
.wrapper {
	margin-top: 10rem;
	width: 760px;
	height: auto;
	background-color: white;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 3px;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}
.ticket-one {
	width: 750px;
	height: 330px;
	display: flex;
	border-radius: 10px;
}
.wrapper:hover {
	transition: 0.1s ease-in-out;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
}
#ticketTwo {
	position: absolute;
	top: 20px;
	transform: rotate(-10deg);
	z-index: -1;
}
#ticketTwo:hover {
	transform: rotate(-11deg);
	transition: 0.1s ease-in-out;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
}
.main-pass {
	flex: 4;
	display: flex;
	flex-direction: column;
}
.flight-heading {
	flex: 1;
	display: flex;
}
.blanks {
	flex: 2;
}
.fheading {
	padding: 5px;
}
.fheading h3 {
	font-family: "Montserrat", sans-serif;
	font-weight: 400;
	color: var(--blue);
}
.fheading h2 {
	font-family: "Roboto Mono", monospace;
	font-weight: 600;
	font-size: 2em;
	color: var(--blue);
}
.barcode-container {
	padding: 3px;
	z-index: 1;
	position: relative;
	top: -50px;
	background-color: rgb(252, 252, 252);
}
.codeline1 {
	height: 1px;
	background-color: black;
	margin-bottom: 1.2px;
}
.codeline2 {
	height: 0.1px;
	background-color: black;
	margin-bottom: 1px;
}
.codeline3 {
	height: 0.1px;
	background-color: black;
	margin-bottom: 0.1px;
}
.codeline4 {
	height: 2px;
	background-color: black;
	margin-bottom: 1px;
}
.fheading {
	flex: 4;
}
.main-flight-details {
	flex: 3;
	background-color: var(--blue);
	display: flex;
}
.margin-color-code {
	padding: 10px;
	flex: 1;
	display: flex;
	flex-direction: column;
}
.mfbtime p {
	color: whitesmoke;
	font-family: "Roboto Mono", monospace;
	text-align: center;
}
.mf-stampc {
	width: 300px;
	height: auto;
	z-index: 1;
	overflow: hidden;
	position: absolute;
	display: flex;
	justify-content: center;
	align-items: center;
}
.mftravelstamp {
	width: 150px;
	height: 80px;
	border: 3px double var(--redstamp);
	border-radius: 50%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	color: var(--redstamp);
	font-family: "Saira Stencil One", cursive;
	transform: rotate(-5deg);
	opacity: 0.94;
}
.mfsecuritystamp {
	width: 150px;
	height: 80px;
	border: 3px double var(--blue);
	border-radius: 10%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	color: var(--blue);
	font-family: "Saira Stencil One", cursive;
	font-size: 0.8em;
	transform: rotate(-5deg);
	opacity: 0.94;
}
.mf-details {
	padding: 10px;
	background-color: rgb(58, 225, 128);
	background-image: url("data:image/png;base64,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");
	background-blend-mode: color-dodge;
	flex: 4;
	display: flex;
	flex-direction: column;
	justify-content: center;
}
.pdetails {
	flex: 3;
	display: flex;
	flex-direction: column;
	justify-content: space-evenly;
}
.pname a {
	text-decoration: none;
	color: black;
}
.pname,
.pfrom,
.pto {
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-direction: row;
}
.pfrom p:first-child,
.pname p:first-child,
.pto p:first-child {
	font-family: "Roboto Mono", monospace;
	color: var(--blue);
}

.pname p:nth-child(2),
.pfrom p:nth-child(2),
.pto p:nth-child(2) {
	font-family: "Allerta Stencil", sans-serif;
	font-size: 1.2em;
	font-weight: 100;
	letter-spacing: 2px;
	text-transform: uppercase;
	transform: rotate(-1deg);
}
.passdetails {
	flex: 1;
	display: flex;
	justify-content: space-around;
	align-items: center;
}
.passgate,
.passdate,
.passflight,
.passseat {
	border-top: 1px solid rgb(72, 72, 72);
	border-right: 1px solid rgb(72, 72, 72);
	padding: 5px;
}
.passgate p:first-child,
.passdate p:first-child,
.passflight p:first-child,
.passseat p:first-child {
	font-family: "Roboto Mono", monospace;
	color: var(--blue);
}
.passgate p:nth-child(2),
.passdate p:nth-child(2),
.passflight p:nth-child(2),
.passseat p:nth-child(2) {
	font-family: "Allerta Stencil", sans-serif;
}
.cpboardingstampc {
	width: 200px;
	height: auto;
	z-index: 1;
	overflow: hidden;
	position: absolute;
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 100px;
}
.boardingstamp {
	color: var(--bluestamp);
	border: 5px double var(--bluestamp);
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 20px;
	border-radius: 50%;
	font-family: "Saira Stencil One", cursive;
	font-size: 0.9em;
	text-transform: capitalize;
	transform: rotate(5deg);
	opacity: 0.94;
}
.counter-pass {
	flex: 2;
	background-color: var(--lightaqua);
	border-left: 2px dashed rgb(181, 181, 181);
	border-radius: 10px;
	padding: 10px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}
.counter-pass h3 {
	font-family: "Montserrat", sans-serif;
	font-weight: 400;
	color: var(--blue);
}
.cpassdetails {
	display: flex;
	justify-content: space-evenly;
	align-items: center;
}
.cpass {
	border-right: 1px solid rgb(72, 72, 72);
	padding: 5px;
}
.cpassname p:first-child,
.cpassfrom p:first-child,
.cpassto p:first-child {
	font-family: "Roboto Mono", monospace;
	color: var(--blue);
}
.cpassname p:nth-child(2),
.cpassfrom p:nth-child(2),
.cpassto p:nth-child(2) {
	font-family: "Allerta Stencil", sans-serif;
	font-size: 0.9em;
	letter-spacing: 2px;
	text-transform: uppercase;
	transform: rotate(-1deg);
}

.cpass p:first-child {
	font-family: "Roboto Mono", monospace;
	color: var(--blue);
}
.cpass p:nth-child(2) {
	font-family: "Allerta Stencil", sans-serif;
}
.cpassimp {
	display: flex;
	justify-content: space-evenly;
	align-items: center;
}
.cpassimp1 {
	font-family: "Roboto Mono", monospace;
	color: var(--blue);
}
.cpassimp1 p:nth-child(2) {
	font-family: "Allerta Stencil", sans-serif;
	color: var(--red);
}
.cpassimpseat {
	border: 1.5px dashed rgb(72, 72, 72);
	padding: 6px;
	font-family: "Allerta Stencil", sans-serif;
	font-size: 1.1em;
	text-align: center;
	color: var(--red);
}

</style>
