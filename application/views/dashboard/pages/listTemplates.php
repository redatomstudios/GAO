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
					<tr>
						<td>
							<input type="checkbox" />Delete, 
							Edit
						</td>
						<td>Flow</td>
						<td>12/12/2013</td>
						<td>Home, About Us</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" />Delete, 
							Edit
						</td>
						<td>Flow</td>
						<td>12/12/2013</td>
						<td>Home, About Us</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" />Delete, 
							Edit
						</td>
						<td>Flow</td>
						<td>12/12/2013</td>
						<td>Home, About Us</td>
					</tr>
				</tbody>
			</table>
			<p>
				<a href="<?= base_url() ?>dash/templates/new"><button type="button">New Template</button></a> <button type="submit">Delete Selected</button>
			</p>
			<?= form_close() ?>
		</div>