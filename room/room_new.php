<?php


?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_cuarto">
				<div class="row">
					<div class="col-md-1 border-right">
						<div class="form-group">
							<label for="" class="control-label">Id Room</label>
							<input type="text" readonly placeholder="Id Room" name="id_cuarto" class="form-control form-control-sm" value="<?php echo isset($id_cuarto) ? $id_cuarto : '' ?>">
						</div>
					</div>
					<div class="col-md-11">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<textarea name="descripcion" id="" cols="30" rows="3" class="form-control"><?php echo isset($descripcion) ? $descripcion : '' ?></textarea>
						</div>
					</div>

				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Guardar</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = '<?php echo SERVERURL ?>room/list/'">Cancelar</button>
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

	input[type=number] {
		-moz-appearance: textfield;
	}
</style>

<script>
	$('#manage_cuarto').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=cuarto_guardar',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Room save.', "success");
					setTimeout(function() {
						location.replace('<?php echo SERVERURL ?>room/list/')
					}, 750)
				}
			}
		})
	})
</script>



<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-cuarto_concepto-container">
	<span class="select2-selection__rendered" id="select2-cuarto_concepto-container" role="textbox" aria-readonly="true">
		<span class="select2-selection__placeholder">Please select here</span>
	</span>
	<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b>
	</span>
</span>

<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-cuarto_concepto-container">
	<span class="select2-selection__rendered" id="select2-cuarto_concepto-container" role="textbox" aria-readonly="true" title="Holas ">Holas </span>
	<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b>
	</span>
</span>