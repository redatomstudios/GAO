	<div id="bodyWrap">
		<div id="pageContent">
			<h1>Templates</h1>
			<?= form_open() ?>
			<table class="sortable listing centerCells">
				<thead>
					<tr>
						<th>Action</th>
						<th>Template Name</th>
						<th>Date Added</th>
						<th>Pages</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i = 0; $i < 5; $i++) { ?>
					<?php // foreach($templates as $thisTemplate) { ?>
					<tr>
						<td>
							<input type="checkbox" name="templateDeletions[]" value="<?= $templateID ?>" /> 
							<a href="<?= base_url() ?>dash/deleteTemplate/<?= $templateID ?>" >Delete</a>, 
							<a href="<?= base_url() ?>dash/templates/<?= $templateID ?>" >Edit</a>
						</td>
						<td>Home</td>
						<td>12/12/2013</td>
						<td>Home, About Us</td>
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