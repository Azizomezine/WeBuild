<?php 
include_once('db_connect.php');
$pdo= config::getConnexion();
if(isset($_GET['id'])){
$qry = $pdo->query("SELECT * FROM booked_flight where id = ".$_GET['id']);
				
foreach($qry->fetch(PDO::FETCH_ASSOC) as $k => $v){
	$$k = $v;
} }
?>
<div class="container-fluid">
	<div class="col-lg-12">
	<form action="" id="book-flight">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<div class="row">
			<div class="col-md-6">
				<label class="control-label">Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo isset($name) ? $name : '' ?>">
			</div>
			<div class="col-md-6">
				<label class="control-label">Contact Number</label>
				<input type="text" name="contact" class="form-control" value="<?php echo isset($contact) ? $contact : '' ?>">
			</div>
		</div>

		<div class="row">
		<div class="form-group col-md-12">
			<label class="control-label">Address</label>
			<input name="address" id=""  class="form-control" value="<?php echo isset($address) ? $address : '' ?>">
		</div>
		</div>
		<div id="row-field">
			<div class="row ">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary btn-sm" >Save</button>
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
		
	</form>
	</div>
</div>
<script>
	$('#go').click(function(){
		start_load()
		$.ajax({
			url:"get_fields.php?count="+$('#count').val(),
			success:function(resp){
				if(resp){
					$('#row-field').prepend(resp)
					$('#qty').hide()
					$('#row-field').show()
					end_load()
				}
			}

		})
	})
	$('#book-flight').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=update_booked',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1 ){
					
					alert_toast("Booked Flight successfully updated.","success")
					setTimeout(function(){
						location.reload();
					},1500)
				}
			}
		})
	})
</script>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>