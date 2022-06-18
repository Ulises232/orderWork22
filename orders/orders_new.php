<?php

$invFolio = calculaFolio("select * from renum_parametros where 1", "id_ordenes");
$alto_tabla = "1000px";


?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_orden">
				<input type="hidden" name="id_orden" value="<?php echo isset($id_orden) ? $id_orden : '' ?>">
				<div class="form-row">
					<div class="col-2">
						<label for="" class="control-label">Invoice</label>
						<input type="text" readonly name="folio" placeholder="Phone " class="form-control form-control-sm" value="<?php echo isset($folio) ? $folio : $invFolio ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Client</label>
							<?php
							if ($archivo != "view") {
							?>
								<select onchange="agregaDatos()" class='form-control form-control-sm select2' name='cliente'>
									<option value=""></option>
									<?php
									$consulta = ejecuta_consulta("select * from clientes where status='1'");

									while ($row = $consulta->fetch_assoc()) :
										if (isset($cliente) ? $cliente : "" == $row["cliente"]) {
											$seleccionado = "selected";
										} else {
											$seleccionado = "";
										}
										$parametros = " $seleccionado data-cPostal ='" . $row["cPostal"] . "' data-estado ='" . $row["estado"] . "' data-ciudad ='" . $row["ciudad"] . "' data-direccion ='" . $row["direccion"] . "' data-telefono1 ='" . $row["telefono1"] . "' data-telefono2 ='" . $row["telefono2"] . "' value='" . $row["id_cliente"] . "' "
									?>

										<option <?php echo $parametros; ?>><?php echo $row['nombre'] . " " . $row['apellidos']  ?> </option>
									<?php
									endwhile;


									?>
								</select>
							<?php
							} else {
							?>
								<input type="text" name="cliente" class="form-control form-control-sm" value="<?php
																												echo mysqli_este("select concat(apellidos,' ',nombre) as nombre_completo from clientes where id_cliente = '" . $cliente . "'", "nombre_completo") ?>">
							<?php
							}

							?>

						</div>
						<div class="form-group">
							<div class="form-group"></div>
							<div class="form-row">
								<div class="col-6">
									<label for="" class="control-label">Phone</label>
									<input type="number" name="telefono1" placeholder="Phone " class="form-control form-control-sm" value="<?php echo isset($telefono1) ? $telefono1 : '' ?>">
								</div>
								<div class="col-6">
									<label for="" class="control-label">Alternative Phone</label>
									<input type="number" name="telefono2" placeholder="Alternative Phone" class="form-control form-control-sm" value="<?php echo isset($telefono2) ? $telefono2 : '' ?>">
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Address</label>
							<input type="text" name="direccion" placeholder="Street Address" class="form-control form-control-sm" value="<?php echo isset($direccion) ? $direccion : '' ?>">
							<div class="form-group"></div>
							<div class="form-row">
								<div class="col-4">
									<label for="" class="control-label">City</label>
									<input type="text" name="ciudad" placeholder="City" class="form-control form-control-sm" value="<?php echo isset($ciudad) ? $ciudad : '' ?>">
								</div>
								<div class="col-4">
									<label for="" class="control-label">State</label>
									<input type="text" name="estado" placeholder="State" class="form-control form-control-sm" value="<?php echo isset($estado) ? $estado : '' ?>">
								</div>
								<div class="col-4">
									<label for="" class="control-label">Zip Code</label>
									<input type="number" name="cPostal" placeholder="Zip Code" class="form-control form-control-sm" value="<?php echo isset($cPostal) ? $cPostal : '' ?>">
								</div>
							</div>
						</div>
					</div>

				</div>
				<hr>
				<?php
				if ($archivo != "view") {
				?>
					<div class="row">

						<div class="col-md-5">

							<label for="" class="control-label">Rooms House </label>
							<select class='form-control form-control-sm select2' id="cuarto_concepto">
								<option data-descripcion=""></option>
								<?php
								$consulta = ejecuta_consulta("select * from cuartos where status='1'");

								while ($row = $consulta->fetch_assoc()) :

									$parametros = " data-descripcion='" . $row["descripcion"] . "' "
								?>

									<option <?php echo $parametros; ?>><?php echo $row['descripcion']  ?> </option>
								<?php
								endwhile;


								?>
							</select>
						</div>

						<div class="col-md-5">
							<label for="" class="control-label">Material </label>
							<select class='form-control form-control-sm select2' id="material_concepto">
								<option data-descripcion=""></option>
								<?php
								$consulta = ejecuta_consulta("select * from materiales where status='1'");

								while ($row = $consulta->fetch_assoc()) :

									$parametros = " data-descripcion='" . $row["descripcion"] . "' "
								?>

									<option <?php echo $parametros; ?>><?php echo $row['descripcion']  ?> </option>
								<?php
								endwhile;


								?>
							</select>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<br>
								<input class="btn btn-success btn-md" type="button" onClick="agregaCampo();" value="Add">
							</div>
						</div>
					</div>
				<?php
					$alto_tabla = "400px";
				}
				?>

				<br>
				<div class="table-bordered tableFixHead" style="height: <?php echo $alto_tabla; ?>">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="table-primary">
								<th width="3%" class="text-center">#</th>
								<th width="20%">Room House</th>
								<th width="20%">Material</th>
								<th class="text-center" width="60%">Description</th>
							</tr>
						</thead>
						<tbody id="lista_conceptos">

							<?php
							if (isset($folio)) {

								$partidas = ejecuta_consulta("select * from ordenes_partidas where folio_orden='$folio'");

								while ($row = $partidas->fetch_assoc()) :
							?>
									<tr>
										<td><input type='button' value=' - ' style='width:100%;text-align:center;' class='btn btn-danger' onClick='eliminaCampo($(this))'></td>
										<td><input class='form-control form-control' name='nombres_cuartos[]' value='<?php echo $row['nombre_cuarto'] ?>' style='width:100%;'></td>
										<td><input class='form-control form-control' name='nombres_materiales[]' value='<?php echo $row['nombre_material']  ?>' style='width:100%;'></td>
										<td><textarea name='descripcion_materiales[]' no cols='30' rows='2' class='form-control'><?php echo $row['descripcion']  ?></textarea></td>

									</tr>
							<?php
								endwhile;
							}

							?>

						</tbody>

					</table>
				</div>
				<br>
				<?php
				if ($archivo != "view") {
				?>

					<div class="col-lg-12 text-right justify-content-center d-flex">
						<button class="btn btn-primary mr-2">Guardar</button>
						<button class="btn btn-secondary" type="button" onclick="location.href = ' <?php echo SERVERURL ?>orders/list/'">Cancelar</button>
					</div>
				<?php
				}
				?>
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
	$('#manage_orden').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=orden_guardar',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == "error") {
					alert_toast('Order not save.', "error");
					setTimeout(function() {
						end_load();
					}, 1050)

				} else {
					alert_toast('Order save.', "success");
					setTimeout(function() {
						location.replace('<?php echo SERVERURL ?>orders/list/')
					}, 750)
				}
			}
		})
	})


	function agregaDatos() {
		var seleccionado = $("[name=cliente]").find('option:selected');
		$("[name=cPostal]").val(seleccionado.attr("data-cPostal"));
		$("[name=telefono1]").val(seleccionado.attr("data-telefono1"));
		$("[name=telefono2]").val(seleccionado.attr("data-telefono2"));
		$("[name=direccion]").val(seleccionado.attr("data-direccion"));
		$("[name=ciudad]").val(seleccionado.attr("data-ciudad"));
		$("[name=estado]").val(seleccionado.attr("data-estado"));
	}


	function agregaCampo() {

		var cuarto_seleccionado = $("#cuarto_concepto").find('option:selected');
		var material_seleccionado = $("#material_concepto").find('option:selected');
		var cuarto_descripcion = cuarto_seleccionado.attr("data-descripcion");
		var material_descripcion = material_seleccionado.attr("data-descripcion");

		var cad = "<tr>";
		cad += "<td><input type='button' value=' - ' style='width:100%;text-align:center;' class='btn btn-danger' onClick='eliminaCampo($(this))'></td>";
		cad += "<td><input  class='form-control form-control' name='nombres_cuartos[]'  value='" + cuarto_descripcion + "' style='width:100%;'></td>";
		cad += "<td><input  class='form-control form-control' name='nombres_materiales[]'  value='" + material_descripcion + "' style='width:100%;'></td>";
		cad += "<td><textarea name='descripcion_materiales[]' no  cols='30' rows='2' class='form-control'></textarea></td>";
		cad += "</tr>";

		if (cuarto_descripcion != "" && material_descripcion != "") {
			$("#lista_conceptos").append(cad);

		} else {
			alert_toast('No haz Seleccionado Ningun Concepto', "error");
		}

	}

	function eliminaCampo(td) {

		$(td).parent("td").parent("tr").remove();

	}
</script>
<?php
if ($archivo == "view") {
	ejecutaJS("
	$('#manage_orden').find('input').attr('readonly',true);
	$('#manage_orden').find('textarea').attr('readonly',true);
	");
}

?>