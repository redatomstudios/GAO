	<div id="bodyWrap">
		<div id="pageContent">
			<h1>Pages</h1>
			<?= form_open() ?>
			<table class="dataTable sortable listing centerCells">
				<thead>
					<tr>
						<th>Action</th>
						<th>Page Title</th>
						<th>Date Added</th>
						<th>Template</th>
					</tr>
				</thead>
				<tbody>
					<?php //for($pageID = 0; $pageID < 5; $pageID++) { ?>
					<?php  foreach($pages as $thisPage) { ?>
					<tr>
						<td>
							<input type="checkbox" name="pageDeletions[]" value="<?= $pageID ?>" /> 
							<a href="<?= base_url() ?>dash/deletePage/<?= $thisPage['id'] ?>" >Delete</a>, 
							<a href="<?= base_url() ?>dash/pages/<?= $thisPage['id'] ?>" >Edit</a>
						</td>
						<td><?= $thisPage['PageTitle'] ?></td>
						<td><?= $thisPage['timestamp'] ?></td>
						<td><?= $thisPage['templateName'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p>
				<input type="submit" name="deletePages" value="Delete Selected" /> or 
				<select name="pageTemplate">
					<option selected="selected">Select a template</option>
					<?php foreach ($templates as $template) { ?>
					<option><?= $template ?></option>
					<?php } ?>
				</select> and
				<input type="button" name="newPage" value="Create New Page" /> with template.

			</p>
			<?= form_close() ?>
		</div>
	</div>