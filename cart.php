<?php 
include_once 'admin/db_connect.php'; 

if($_SERVER['REQUEST_METHOD'] == "POST"){
	foreach($_POST as $k => $v){
		$$k = $v;
	}
}

?>
 <div class="container h-100">
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Booked Flights List</b>
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Information</th>
							<th class="text-center">Flight Info</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$pdo= config::getConnexion();
							$airport = $pdo->query("SELECT * FROM airport_list ");
							while($row = $airport->fetch(PDO::FETCH_ASSOC)){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$i=7;
							$qry = $pdo->query("SELECT b.*,f.*,a.airlines,a.logo_path,b.id as bid FROM  booked_flight b inner join flight_list f on f.id = b.flight_id inner join airlines_list a on f.airline_id = a.id WHERE b.id=$i order by b.id desc");
							while($row = $qry->fetch(PDO::FETCH_ASSOC)):

						 ?>
						 <tr>
						 	
						 	<td><?php echo $i++ ?></td>
						 	<td>
						 		<p>Name :<b><?php echo $row['name'] ?></b></p>
						 		<p><small>Contact # :<b><?php echo $row['contact'] ?></small></b></p>
						 		<p><small>Address :<b><?php echo $row['address'] ?></small></b></p>
						 	</td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<img src="assets/img/<?php echo $row['logo_path'] ?>" alt="">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Airline :<b><?php echo $row['airlines'] ?></b></p>
						 		<p><small>Plane :<b><?php echo $row['plane_no'] ?></small></b></p>
						 		<p><small>Airline :<b><?php echo $row['airlines'] ?></small></b></p>
						 		<p><small>Location :<b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></small></b></p>
						 		<p><small>Departure :<b><?php echo date('M d,Y h:i A',strtotime($row['departure_datetime'])) ?></small></b></p>
						 		<p><small>Arrival :<b><?php echo date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-center">
						 			
                                    <a href="ticket.php"><button  type="button"><i class="fa fa-plus"></i> Get ticket</button></a>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
    	$('#new_ticket').click(function(){
		uni_modal("New ticket","pdf.php",'mid-large')
	})
	$('#booked-flight').dataTable()
	$('#new_booked').click(function(){
		uni_modal("New booked","admin/manage_booked.php",'mid-large')
	})
	$('.edit_booked').click(function(){
		uni_modal("Edit Information","admin/manage_booked.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_booked').click(function(){
		_conf("Are you sure to delete this data?","delete_booked",[$(this).attr('data-id')])
	})
function delete_booked($id){
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=delete_flight',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Flight successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>