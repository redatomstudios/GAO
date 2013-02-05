	<div id="bodyWrap">
		<div id="pageContent">
			<h1>Templates</h1>
			<?= form_open('/dash/templates/delete') ?>
			<table class="dataTable sortable listing centerCells">
				<thead>
					<tr>
						<th>Action</th>
						<th>Template Name</th>
						<th>Date Added</th>
						<th>Pages</th>
					</tr>
				</thead>
				<tbody>
					<?php // for($i = 0; $i < 5; $i++) { ?>
					<?php  foreach($templates as $thisTemplate) { ?>
					<tr>
						<td>
							<input type="checkbox" name="templateDeletions[]" value="<?= $thisTemplate['id'] ?>" /> 
							<a href="<?= base_url() ?>dash/templates/delete/<?= $thisTemplate['id'] ?>" >Delete</a>, 
							<a href="<?= base_url() ?>dash/templates/<?= $thisTemplate['id'] ?>" >Edit</a>
						</td>
						<td><?= $thisTemplate['templateName'] ?></td>
						<td><?= $thisTemplate['timestamp'] ?></td>
						<?php 
						if(sizeof($thisTemplate['pageDetails']) == 0)
							$pages = 'None';
						else{
							foreach ($thisTemplate['pageDetails'] as $page) {
								# code...
								$pages[] = $page['PageName'];
							}
							$pages = implode(',', $pages);
						}
						?>
						<td><?= $pages ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p>
				<input type="submit" value="Delete Selected" /> or
				<a href="<?= base_url() ?>dash/templates/new"><input type="button" value="Add New Template" /></a> 
			</p>
			<?= form_close() ?>
		</div>
	</div>
