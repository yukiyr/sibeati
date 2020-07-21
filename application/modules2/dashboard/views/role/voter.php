<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pendaftar</p></h1>
	</div>

	<form role="form" method="POST">
		<div class = "row">
			<div class="col-md-12 col-lg-2">
					<select class="form-control" name="tahun">
						<?php foreach($distinct as $row)
						{ 
							echo '<option value="'.$row->tahun.'">'.$row->tahun.'</option>';
						}
						?>
					</select>
			</div>
			<div class="col-md-12 col-lg-2">
				<select class="form-control" name="periode">
					<?php foreach($distinct as $row)
					{ 
						echo '<option value="'.$row->periode.'">'.$row->periode.'</option>';
					}
					?>
				</select>
			</div>			
			<div class="col-md-12 col-lg-1">
				<input class="btn btn-primary btn-sm float-right" id="formSubmit" type="submit" name="getRecords" value="Tampil" />
			</div>
		</div>
	</form>
	<br>
	<!-- DataTables -->
	<div class="card mb-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NRP</th>
							<th>Nama Lengkap</th>
							<th>Penghasilan Orang Tua</th>
							<th>UKT</th>
							<th>IPK</th>
							<th>Aksi</th>
							<th>Vote</th>						
						</tr>
					</thead>
					<tbody>
						<?php foreach ($records as $pendaftar): ?>
							<tr>
								<td>
									<?php echo $pendaftar->nrp ?>
								</td>
								<td>
									<?php echo $pendaftar->nama_lengkap ?>
								</td>
								<td>
									<?php echo $pendaftar->penghasilan_ortu ?>
								</td>
								<td>
									<?php echo $pendaftar->ukt ?>
								</td>
								<td>
									<?php echo $pendaftar->ipk ?>
								</td>
								<td>
									<a href="<?php echo site_url('dashboard') ?>" role="button" class="btn btn-primary">Detail</a>
								</td>
								<td>
									<input type="checkbox" name="pendaftar_id" value="<?php echo $pendaftar->pendaftar_id; ?>">
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
