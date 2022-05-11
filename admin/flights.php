<?php include_once 'db_connect.php' ;
include_once 'header.php';
?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Flight List</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_flight"><i class="fa fa-plus"></i> New Flight</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="40%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">Date</th>
							<th class="text-center">Information</th>
							<th class="text-center">Seats</th>
							<th class="text-center">Booked</th>
							<th class="text-center">Available</th>
							<th class="text-center">Price</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$pdo = config::getConnexion();
	                                	$airport = $pdo->query("SELECT * FROM airport_list ");
										while($row = $airport->fetch(PDO::FETCH_ASSOC)){
											$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
										}
										/*$row_count = $pdo->query("SELECT count(*) FROM flight_list")->fetchColumn(); */
										$qry = $pdo->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id  order by id desc");
										while($row = $qry->fetch(PDO::FETCH_ASSOC)):
											
											
											$booked= $pdo->query("SELECT b.* FROM booked_flight b WHERE flight_id  = ".$row['id'])->rowCount();
										
											 
							
						 ?>

						 <tr>
						 	
						 	<td><?php	 echo date('M d,Y',strtotime($row['date_created'])) ; ?></td>	
									 
                              
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<img src="../views/assets/img/<?php echo $row['logo_path'] ?>" alt="" class="btn-rounder badge-pill">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Airline :<b><?php  if (!empty($row)) {  echo $row['airlines'] ;}?></b></p>
						 		<p><small>Airline :<b><?php echo $row['airlines'] ?></small></b></p>
						 		<p><small>Location :<b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></small></b></p>
						 		<p><small>Departure :<b><?php echo date('M d,Y h:i A',strtotime($row['departure_datetime'])) ?></small></b></p>
						 		<p><small>Arrival :<b><?php echo date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-right"><?php echo $row['seats'] ?></td>
						 	<td class="text-right"><?php echo $booked ?></td>
						 	<td class="text-right"><?php echo $row['seats'] - $booked ?></td>
						 	<td class="text-right"><?php echo number_format($row['price'],2) ?></td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_flight" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_flight" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						 <?php endwhile; ?>
					</tbody>
				</table>
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
	$('#flight-list').dataTable()
	$('#new_flight').click(function(){
		uni_modal("New Flight","manage_flight.php",'mid-large')
	})
	$('.edit_flight').click(function(){
		uni_modal("Edit Flight","manage_flight.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_flight').click(function(){
		_conf("Are you sure to delete this Flight?","delete_flight",[$(this).attr('data-id')])
	})
       function delete_flight($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_flight',
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
</script>
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib1/chart/chart.min.js"></script>
    <script src="lib1/easing/easing.min.js"></script>
    <script src="lib1/waypoints/waypoints.min.js"></script>
    <script src="lib1/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib1/tempusdominus/js/moment.min.js"></script>
    <script src="lib1/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib1/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js1/main.js"></script>