<?php


?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_ciudad">
				<input type="hidden" name="id_cliente" value="<?php echo isset($id_cliente) ? $id_cliente : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Name</label>
							<input type="text" name="nombre" class="form-control form-control-sm"  value="<?php echo isset($nombre) ? $nombre: '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Names</label>
							<input type="text" name="apellidos" class="form-control form-control-sm"  value="<?php echo isset($apellidos) ? $apellidos: '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Email Address</label>
							<input type="text" name="correo" placeholder="Email Address" class="form-control form-control-sm"  value="<?php echo isset($correo) ? $correo: '' ?>">
							<div class="form-group"></div>
							<div class="form-row">
								<div class="col-6">
								<label for="" class="control-label">Phone</label>
								<input type="number" name="telefono1" placeholder="Phone " class="form-control form-control-sm"  value="<?php echo isset($telefono1) ? $telefono1: '' ?>">
								</div>
								<div class="col-6">
								<label for="" class="control-label">Alternative Phone</label>
								<input type="number" name="telefono2" placeholder="Alternative Phone" class="form-control form-control-sm"  value="<?php echo isset($telefono2) ? $telefono2: '' ?>">
								</div>
							</div>
						</div>	
							
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Address</label>
							<input type="text" name="direccion" placeholder="Street Address" class="form-control form-control-sm"  value="<?php echo isset($direccion) ? $direccion: '' ?>">
							<div class="form-group"></div>
							<div class="form-row">
								<div class="col-8">
								<label for="" class="control-label">City</label>
								<input type="text" name="ciudad" placeholder="City" class="form-control form-control-sm"  value="<?php echo isset($ciudad) ? $ciudad: '' ?>">
								</div>
								<div class="col">
								<label for="" class="control-label">Zip Code</label>
								<input type="number" name="cPostal" placeholder="Zip Code" class="form-control form-control-sm"  value="<?php echo isset($cPostal) ? $cPostal: '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">State</label>
							<input type="text" name="estado" placeholder="State" class="form-control form-control-sm"  value="<?php echo isset($estado) ? $estado: '' ?>">

						</div>
						<div class="form-group ">
							<div class="form-row">
								<div class="col-4">
								<label for="" class="control-label">Date of Birth</label>
								<input type="date" name="fecha_nacimiento" placeholder="" onchange="Edad(this.value,'EdadAños')" class="form-control form-control-sm"  value="<?php echo isset($fecha_nacimiento) ? $fecha_nacimiento: '' ?>">
								</div>
								<div class="col-4">
								<label for="" class="control-label">Age</label>
								<input type="text" readonly id="EdadAños" placeholder="" class="form-control form-control-sm"  value="<?php echo calculaedad( isset($fecha_nacimiento) ? $fecha_nacimiento: date('Y-m-d')) ?>">
								</div>
								<div class="col-4">
								<label for="" class="control-label">Gender</label>
								<?php echo select_varios("sexo",isset($sexo) ? $sexo : '',"1=Female|2=Male") ?>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<hr>	
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Guardar</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=cliente_lista'">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
	
</div>

<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none; 
	margin: 0; 
	}

	input[type=number] { -moz-appearance:textfield; }
</style>

<script>



	$('#manage_ciudad').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'<?php echo SERVERURL ?>ajax.php?action=cliente_guardar',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Client save.',"success");
					setTimeout(function(){
						location.replace('<?php echo SERVERURL ?>clients/clients_list/')
					},750)
				}
			}
		})
	})
</script>