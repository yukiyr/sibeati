<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pendaftar</p></h1>
	</div>
	<!-- DataTables -->
	<div class="card mb-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nama Lengkap</th>
							<th>Nama Panggilan</th>
							<th>NRP</th>
							<th>KTP</th>						
                        </tr>
					</thead>
					<tbody>
						<?php foreach ($pendaftar as $pendaftar): ?>
							<tr>
								<td>
									<?php echo $pendaftar->nama_lengkap ?>
								</td>
								<td>
									<?php echo $pendaftar->nama_panggilan ?>
								</td>
								<td>
									<?php echo $pendaftar->nrp ?>
								</td>
								<td>
									<?php echo $pendaftar->ktp ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</html>
