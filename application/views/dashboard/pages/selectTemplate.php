		<div id="pageContent">
			<h1>Select Template</h1>
			<?= form_open() ?>
			<select name="templateName">
				<option>Template 1</option>
				<option>Template 1</option>
				<option>Template 1</option>
				<option>Template 1</option>
			</select>
			<p>
				<a href="<?= base_url() ?>dash/pages/new"><button type="submit">Next >></button></a> 
				<a href="<?= base_url() ?>dash/pages"><button type="button">Cancel</button></a>
			</p>
			<?= form_close() ?>
		</div>