<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="<?php echo SERVERURL ?>room/new/"><i class="fa fa-plus"></i>Add Room</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th width="5%" class="text-center">#</th>
						<th width="15%">ID Rooms</th>
						<th width="70%">Description</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM cuartos where status = 1 order by id_cuarto asc");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<th class="text-center"><?php echo $i++ ?></th>
							<td><b><?php echo $row['id_cuarto'] ?></b></td>
							<td><b><?php echo ucwords($row['descripcion']) ?></b></td>
							<td class="text-center">
								<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									Action
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo SERVERURL ?>room/edit/<?php echo $row['id_cuarto'] ?>">Edit</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="accionPaginas('Are u sure archive the Room House?','archivar',[<?php echo $row['id_cuarto'] ?>,'cuarto'])">Archive</>
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