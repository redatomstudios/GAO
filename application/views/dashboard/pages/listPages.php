		<div id="pageContent">
			<h1>Pages</h1>
			<?= form_open() ?>
			<table class="sortable listing centerCells">
				<thead>
					<tr>
						<th>Action</th>
						<th>Page Title</th>
						<th>Date Added</th>
						<th>Template</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i = 0; $i < 5; $i++) { ?>
					<?php // foreach($pages as $thisPage) { ?>
					<tr>
						<td>
							<input type="checkbox" name="pageDeletions[]" value="<?= $pageID ?>" /> 
							<a href="<?= base_url() ?>dash/deletePage/<?= $pageID ?>" >Delete</a>, 
							<a href="<?= base_url() ?>dash/pages/<?= $pageID ?>" >Edit</a>
						</td>
						<td>Home</td>
						<td>12/12/2013</td>
						<td>Casefile</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p>
				<input type="submit" name="deletePages" value="Delete Selected" /> or 
				<select name="pageTemplate">
					<option selected="selected">Select a template</option>
					<option>Template 1</option>
					<option>Template 2</option>
					<option>Template 3</option>
					<option>Template 4</option>
				</select> and
				<input type="button" name="newPage" value="Create New Page" /> with template.

			</p>
			<?= form_close() ?>
		</div>