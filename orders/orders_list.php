<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<b>Orders List</b>
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="<?php echo SERVERURL ?>orders/new/"><i class="fa fa-plus"></i>Add Order</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th width="1%" class="text-center">#</th>
						<th width="1%">Invoice</th>
						<th>Client</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM ordenes where status = 1 order by folio asc");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<th class="text-center"><?php echo $i++ ?></th>
							<td><b><?php echo $row['folio'] ?></b></td>
							<td><b><?php echo mysqli_este("select concat(apellidos,' ',nombre) as nombre_completo from clientes where id_cliente = '" . $row['cliente'] . "'", "nombre_completo") ?></b></td>
							<td><b><?php echo ucwords($row['direccion']) ?></b></td>
							<td><b><?php echo $row['telefono1'] ?></b></td>
							<td class="text-center">
								<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									Action
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo SERVERURL ?>orders/view/<?php echo $row['folio'] ?>">View</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo SERVERURL ?>orders/edit/<?php echo $row['folio'] ?>">Edit</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="accionPaginas('Are u sure archive the Order?','archivar',[<?php echo $row['folio'] ?>,'orden'])">Archive</a>
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
</script>