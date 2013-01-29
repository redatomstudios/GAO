	<div id="bodyWrap">
		<div id="pageContent">
			<h1><?= isset($pageHeading) ? $pageHeading : "Edit Template" ?></h1>
			<?= form_open() ?>
			<table class="sortable listing">
				<tbody>
					<tr>
						<td>
							<label for="templateName">Template Name:</label>
						</td>
						<td>
							<input type="text" name="templateName" id="templateName" />
						</td>
						<td>

						</td>
					</tr>
					<tr>
						<td>
							<label for="publicView">Public View:</label>
						</td>
						<td>
							<input type="file" name="publicView" id="publicView" />
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="cmsView">CMS View:</label>
						</td>
						<td>
							<input type="file" name="cmsView" id="cmsView" />
						</td>
						<td>
							
						</td>
					</tr>
				</tbody>
			</table>
			<h2>
				Database Table Fields:
			</h2>
			<table class="centerCells" id="fieldList">
				<thead>
					<tr>
						<th>Field Name</th>
						<th>Field Type</th>
						<th>Field Length</th>
						<th>Default Value</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<input type="text" name="fieldName[]" />
						</td>
						<td>
							<select name="fieldType[]">
								<option>INT</option>
								<option>VARCHAR</option>
								<option>TEXT</option>
								<option>DATE</option>
								<optgroup label="NUMERIC">
									<option>TINYINT</option>
									<option>SMALLINT</option>
									<option>MEDIUMINT</option>
									<option>INT</option>
									<option>BIGINT</option>
									<option disabled="disabled">-</option>
									<option>DECIMAL</option>
									<option>FLOAT</option>
									<option>DOUBLE</option>
									<option>REAL</option>
									<option disabled="disabled">-</option>
									<option>BIT</option>
									<option>BOOLEAN</option>
									<option>SERIAL</option>
								</optgroup>
								<optgroup label="DATE and TIME">
									<option>DATE</option>
									<option>DATETIME</option>
									<option>TIMESTAMP</option>
									<option>TIME</option>
									<option>YEAR</option>
								</optgroup>
								<optgroup label="STRING">
									<option>CHAR</option>
									<option>VARCHAR</option>
									<option disabled="disabled">-</option>
									<option>TINYTEXT</option>
									<option>TEXT</option>
									<option>MEDIUMTEXT</option>
									<option>LONGTEXT</option>
									<option disabled="disabled">-</option>
									<option>BINARY</option>
									<option>VARBINARY</option>
									<option disabled="disabled">-</option>
									<option>TINYBLOB</option>
									<option>MEDIUMBLOB</option>
									<option>BLOB</option>
									<option>LONGBLOB</option>
									<option disabled="disabled">-</option>
									<option>ENUM</option>
									<option>SET</option>
								</optgroup>
								<optgroup label="SPATIAL">
									<option>GEOMETRY</option>
									<option>POINT</option>
									<option>LINESTRING</option>
									<option>POLYGON</option>
									<option>MULTIPOINT</option>
									<option>MULTILINESTRING</option>
									<option>MULTIPOLYGON</option>
									<option>GEOMETRYCOLLECTION</option>
								</optgroup>
							</select>
						</td>
						<td>
							<input type="text" name="fieldLength[]" />
						</td>
						<td>
							<input type="text" name="fieldDefault[]" /> 
						</td>
					</tr>
										<tr>
						<td>
							<input type="text" name="fieldName[]" />
						</td>
						<td>
							<select name="fieldType[]">
								<option>INT</option>
								<option>VARCHAR</option>
								<option>TEXT</option>
								<option>DATE</option>
								<optgroup label="NUMERIC">
									<option>TINYINT</option>
									<option>SMALLINT</option>
									<option>MEDIUMINT</option>
									<option>INT</option>
									<option>BIGINT</option>
									<option disabled="disabled">-</option>
									<option>DECIMAL</option>
									<option>FLOAT</option>
									<option>DOUBLE</option>
									<option>REAL</option>
									<option disabled="disabled">-</option>
									<option>BIT</option>
									<option>BOOLEAN</option>
									<option>SERIAL</option>
								</optgroup>
								<optgroup label="DATE and TIME">
									<option>DATE</option>
									<option>DATETIME</option>
									<option>TIMESTAMP</option>
									<option>TIME</option>
									<option>YEAR</option>
								</optgroup>
								<optgroup label="STRING">
									<option>CHAR</option>
									<option>VARCHAR</option>
									<option disabled="disabled">-</option>
									<option>TINYTEXT</option>
									<option>TEXT</option>
									<option>MEDIUMTEXT</option>
									<option>LONGTEXT</option>
									<option disabled="disabled">-</option>
									<option>BINARY</option>
									<option>VARBINARY</option>
									<option disabled="disabled">-</option>
									<option>TINYBLOB</option>
									<option>MEDIUMBLOB</option>
									<option>BLOB</option>
									<option>LONGBLOB</option>
									<option disabled="disabled">-</option>
									<option>ENUM</option>
									<option>SET</option>
								</optgroup>
								<optgroup label="SPATIAL">
									<option>GEOMETRY</option>
									<option>POINT</option>
									<option>LINESTRING</option>
									<option>POLYGON</option>
									<option>MULTIPOINT</option>
									<option>MULTILINESTRING</option>
									<option>MULTIPOLYGON</option>
									<option>GEOMETRYCOLLECTION</option>
								</optgroup>
							</select>
						</td>
						<td>
							<input type="text" name="fieldLength[]" />
						</td>
						<td>
							<input type="text" name="fieldDefault[]" /> 
						</td>
					</tr>
				</tbody>
			</table>
			<p>
				<button type="submit">Save Template</button> <button type="button" id="addField">Add Field</button>
			</p>
			<?= form_close() ?>
		</div>
		<script>
			// Script snippet to add a new row when [Add Field] is clicked
			$('#addField').click(function() {
				var rowContent = $('table#fieldList').find('tr')[1];
				$('table#fieldList').append('<tr>' + $(rowContent).html() + '</tr>');
			});
		</script>
	</div>