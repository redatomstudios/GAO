	<div id="bodyWrap">
		<div class="pageContent">
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
							<input type="checkbox" name="pageDeletions[]" value="<?= $thisPage['pageName'] ?>" /> 
							<a href="<?= base_url() ?>dash/deletePage/<?= $thisPage['pageName'] ?>" >Delete</a>, 
							<a href="<?= base_url() ?>dash/pages/<?= $thisPage['pageName'] ?>" >Edit</a>
						</td>
						<td><?= $thisPage['pageTitle'] ?></td>
						<td><?= $thisPage['timestamp'] ?></td>
						<td><?= $thisPage['templateName'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p>
				<input type="submit" name="deletePages" value="Delete Selected" style="float: left; margin-right: 5px;" />
				<?= form_close() ?> or <?= form_open('/dash/newPageCMS', array('style' => 'display: inline;')) ?>
				<select name="pageTemplate">
					<option value="0" selected="selected">Select a template</option>
					<?php foreach ($templates as $templateId => $template) { ?>
					<option value="<?= $templateId ?>"><?= $template ?></option>
					<?php } ?>
				</select> and
				<input type="submit" name="newPage" value="Create New Page" /> with template.
				<?= form_close() ?>
			</p>
		</div>
	</div>