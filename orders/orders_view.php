<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM ordenes where folio = " . $id)->fetch_array();
foreach ($qry as $k => $v) {
	$$k = $v;
}
?>

<?php

$invFolio = calculaFolio("select * from renum_parametros where 1", "id_ordenes");

?>
<div class="col-lg-12">
	<div class="card" id="manage_orden">
		<div class="card-body">
			<input type="hidden" name="id_orden" value="<?php echo isset($id_orden) ? $id_orden : '' ?>">
			<div id="tituloHeader">
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
							<input type="text" name="cliente" class="form-control form-control-sm" value="<?php echo mysqli_este("select concat(apellidos,' ',nombre) as nombre_completo from clientes where id_cliente = '" . $cliente . "'", "nombre_completo") ?>">
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
			</div>
			<div class="card card-outline card-success">
				<div class="card-header">
					<b>Order List</b>
					<div class="card-tools">
						<button class="btn btn-flat btn-sm bg-gradient-success btn-success" onclick="imprimirTabla('printable','oli','tituloHeader')"><i class="fa fa-print"></i> Print</button>
					</div>
				</div>
				<br>
				<div class="card-body p-0">
					<div class="table-bordered tableFixHead" id="printable" style="height: <?php echo $alto_tabla; ?>">
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
									$contador = 1;
									while ($row = $partidas->fetch_assoc()) :
								?>
										<tr>
											<td><?php echo $contador; ?></td>
											<td><?php echo $row['nombre_cuarto'] ?></td>
											<td><?php echo $row['nombre_material'] ?></td>
											<td><?php echo $row['descripcion']  ?></td>

										</tr>
								<?php
									endwhile;
								}

								?>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>



<script>
	$('#manage_orden').find('input').attr('readonly', true);
	$('#manage_orden').find('textarea').attr('readonly', true);
</script>