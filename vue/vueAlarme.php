<div class="row">
	<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ID</th>
								<th>Date</th>
								<th>Heure</th>
								<th>Déclenchement</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$requeteIntrusion = getIntrusion($bdd, '1000');
							while($donnees = $requeteIntrusion->fetch()){?>
							<tr class="odd gradeX">
								<td><?php echo $donnees['id']; ?></td>
								<td><?php echo $donnees['date']; ?></td>
								<td><?php echo $donnees['heure']; ?></td>
								<td><?php echo $donnees['declenchement']; ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
	</div>
</div>
