	<div id="bodyWrap">
		<div class="pageContent">
			<h1>New Page</h1>
			<?= form_open() ?>
			<input type="hidden" name="templateId" value="<?= $templateId ?>" />
			<table class="sortable listing">
				<tbody>
					<tr>
						<td>
							<label for="pageName">Page Name:</label>
						</td>
						<td>
							<input type="text" name="pageName" id="pageName" placeholder="Name that shows up in the title bar" />
						</td>
						<td>

						</td>
					</tr>
					<tr>
						<td>
							<label for="pageHeading">Page Heading:</label>
						</td>
						<td>
							<input type="text" name="pageHeading" id="pageHeading" placeholder="Heading that shows up on the page" />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="pageTitle">Page Title:</label>
						</td>
						<td>
							<input type="text" name="pageTitle" id="pageTitle" placeholder="Title that is prepended in the tab/window" />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="pageContent">Page Content:</label>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea name="pageContent" id="pageContent" placeholder="Enter webpage HTML content here"></textarea>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="submit" />
						</td>
					</tr>
				</tbody>
			</table>
			<?= form_close() ?>
		</div>
	</div>
