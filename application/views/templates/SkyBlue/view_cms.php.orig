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
							<input type="text" name="pageName" id="pageName" <?= (isset($pageName)?"value=\"$pageName\"":"placeholder=\"Name that shows up in the title bar\"") ?> />
						</td>
						<td>

						</td>
					</tr>
					<tr>
						<td>
							<label for="pageHeading">Page Heading:</label>
						</td>
						<td>
							<input type="text" name="pageHeading" id="pageHeading" <?= (isset($pageHeading)?"value=\"$pageHeading\"":"placeholder=\"Heading that shows up on the page\"") ?> />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="pageTitle">Page Title:</label>
						</td>
						<td>
							<input type="text" name="pageTitle" id="pageTitle" <?= (isset($pageTitle)?"value=\"$pageTitle\"":"placeholder=\"Title that is prepended in the tab/window\"") ?> />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="pageGroup">Page Group:</label>
						</td>
						<td>
							<input type="text" name="pageGroup" id="pageGroup" <?= (isset($pageGroup)?"value=\"$pageGroup\"":"placeholder=\"Navigation group, usually the same as the Page Name\"") ?> />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="navOrder">Navigation Order:</label>
						</td>
						<td>
							<input type="text" name="navOrder" id="navOrder" <?= (isset($navOrder)?"value=\"$navOrder\"":"placeholder=\"Navigation order, 1 is at the top. Use 0 to exclude from the navigation.\"") ?> />
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
							<textarea name="pageContent" id="pageContent" <?php if(!isset($pageContent)) echo "placeholder=\"Enter webpage HTML content here\""; ?>> <?php if(isset($pageContent)) echo $pageContent; ?> </textarea>
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
