<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="<?php echo SERVERURL ?>clients/new/"><i class="fa fa-plus"></i>Add Client</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Full Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Zip Code</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT id_cliente, concat(apellidos,' ',nombre) as nombre_completo, direccion,ciudad,cPostal,telefono1 as telefono FROM clientes where status = 1 order by  concat(apellidos,' ',nombre) asc");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<th class="text-center"><?php echo $i++ ?></th>
							<td><b><?php echo $row['nombre_completo'] ?></b></td>
							<td><b><?php echo ucwords($row['direccion']) ?></b></td>
							<td><b><?php echo ucwords($row['ciudad']) ?></b></td>
							<td><b><?php echo ucwords($row['cPostal']) ?></b></td>
							<td><b><?php echo $row['telefono'] ?></b></td>
							<td class="text-center">
								<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									Action
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo SERVERURL ?>clients/edit/<?php echo $row['id_cliente'] ?>">Edit</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="accionPaginas('Are u sure archive the client?','cliente_archivar',<?php echo $row['id_cliente'] ?>)" >Archive</a>
								</div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#list').dataTable()

	})





	function cliente_archivar($id) {
		start_load()
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=cliente_archivar',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>