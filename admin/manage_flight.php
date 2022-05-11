<?php include_once 'db_connect.php' ;

include_once 'header.php';

?>
<?php 
$pdo = config::getConnexion();
if(isset($_GET['id'])){
	$qry = $pdo->query("SELECT * FROM flight_list where id=".$_GET['id']);
	foreach($qry->fetch(PDO::FETCH_ASSOC)  as $k => $val){
		$$k = $val;
	}
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manseats-flight">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="" class="control-label">Airline</label>
						<select name="airline" id="airline" >
							<option></option>
							<?php 
							$pdo = config::getConnexion();
							$airline = $pdo->query("SELECT * FROM airlines_list order by airlines asc");
							while($row = $airline->fetch(PDO::FETCH_ASSOC)):
							?>
								<option value="<?php echo $row['id'] ?>" <?php echo isset($airline_id) && $airline_id == $row['id'] ? "selected" : '' ?>><?php echo $row['airlines'] ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="">Plane No</label>
						<input name="plane_no" id="" class="form-control" value="<?php echo isset($plane_no) ? $plane_no : '' ?>">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Location</label>
						<select name="departure_airport_id" id="departure_location" >
							<option value=""></option>
						<?php
						$pdo = config::getConnexion();
							$airport = $pdo->query("SELECT * FROM airport_list order by airport asc");
						while($row = $airport->fetch(PDO::FETCH_ASSOC)):
						?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
						<?php endwhile; ?>
						</select>

					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Location</label>
						<select name="arrival_airport_id" id="arrival_airport_id" >

							<option value=""></option>

						<?php
						$pdo = config::getConnexion();
							$airport = $pdo->query("SELECT * FROM airport_list order by airport asc");
						while($row = $airport->fetch(PDO::FETCH_ASSOC)):
						?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
						<?php endwhile; ?>
						</select>

					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Data/Time</label>
						<input type="text" name="departure_datetime" id="departure_datetime" class="form-control datetimepicker" value="<?php echo isset($departure_datetime) ? date("Y-m-d H:i",strtotime($departure_datetime)) : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="text" name="arrival_datetime" id="arrival_datetime" class="form-control datetimepicker" value="<?php echo isset($arrival_datetime) ? date("Y-m-d H:i",strtotime($arrival_datetime)) : '' ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Seats</label>
						<input name="seats" id="seats" type="number" min="0" step="any" class="form-control text-right" value="<?php echo isset($seats) ? $seats : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Price</label>
						<input name="price" id="price" type="number" min="0" step="any" class="form-control text-right" value="<?php echo isset($price) ? $price : '' ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.select2').each(function(){
		$(this).select2({
		    placeholder:"Please select here",
		    width: "100%"
		  })
	})
	})
	 $('.datetimepicker').datetimepicker({
      format:'Y-m-d H:i',
  })
	 $('#manseats-flight').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_flight',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Flight successfully saved.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
	

  

</script>
