	<div id="bodyWrap">
		<div id="pageContent">
			<h1><?= isset($pageHeading) ? $pageHeading : "Edit Template" ?></h1>
			<?= form_open_multipart() ?>
			<table class="sortable listing">
				<tbody>
					<tr>
						<td>
							<label for="templateName">Template Name:</label>
						</td>
						<td>
							<input type="text" name="templateName" id="templateName" <?php echo 'value="'.(isset($templateName)?$templateName:'').'"'; ?>/>
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

					<tr>
						<td colspan="3">
							<label for="cmsView">CSS Files:</label>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							
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

					<?php if(!isset($fields)) {?>
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
					<?php } else{

						foreach ($fields as $field) {
						
						if($field['Field'] == 'id')
							continue;
						$type = $field['Type'];
						$type = explode('(', $type);
						$size = substr($type[1], 0, strlen($type[1])-1);
						$type = $type[0];
					 ?>

					 <tr>
						<td>
							<input type="text" name="fieldName[]" value='<?= $field['Field'] ?>'/>
						</td>
						<td>

							<select name="fieldType[]">
								<option<?= (strcasecmp($type,'INT')==0?' selected="selected"':'') ?>>INT</option>
								<option<?= (strcasecmp($type,'VARCHAR')==0?' selected="selected"':'') ?>>VARCHAR</option>
								<option<?= (strcasecmp($type,'TEXT')==0?' selected="selected"':'') ?>>TEXT</option>
								<option<?= (strcasecmp($type,'DATE')==0?' selected="selected"':'') ?>>DATE</option>
								<optgroup label="NUMERIC">
									<option<?= (strcasecmp($type,'TINYINT')==0?' selected="selected"':'') ?>>TINYINT</option>
									<option<?= (strcasecmp($type,'SMALLINT')==0?' selected="selected"':'') ?>>SMALLINT</option>
									<option<?= (strcasecmp($type,'MEDIUMINT')==0?' selected="selected"':'') ?>>MEDIUMINT</option>
									<option<?= (strcasecmp($type,'INT')==0?' selected="selected"':'') ?>>INT</option>
									<option<?= (strcasecmp($type,'BIGINT')==0?' selected="selected"':'') ?>>BIGINT</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'DECIMAL')==0?' selected="selected"':'') ?>>DECIMAL</option>
									<option<?= (strcasecmp($type,'FLOAT')==0?' selected="selected"':'') ?>>FLOAT</option>
									<option<?= (strcasecmp($type,'DOUBLE')==0?' selected="selected"':'') ?>>DOUBLE</option>
									<option<?= (strcasecmp($type,'REAL')==0?' selected="selected"':'') ?>>REAL</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'BIT')==0?' selected="selected"':'') ?>>BIT</option>
									<option<?= (strcasecmp($type,'BOOLEAN')==0?' selected="selected"':'') ?>>BOOLEAN</option>
									<option<?= (strcasecmp($type,'SERIAL')==0?' selected="selected"':'') ?>>SERIAL</option>
								</optgroup>
								<optgroup label="DATE and TIME">
									<option<?= (strcasecmp($type,'DATE')==0?' selected="selected"':'') ?>>DATE</option>
									<option<?= (strcasecmp($type,'DATETIME')==0?' selected="selected"':'') ?>>DATETIME</option>
									<option<?= (strcasecmp($type,'TIMESTAMP')==0?' selected="selected"':'') ?>>TIMESTAMP</option>
									<option<?= (strcasecmp($type,'TIME')==0?' selected="selected"':'') ?>>TIME</option>
									<option<?= (strcasecmp($type,'YEAR')==0?' selected="selected"':'') ?>>YEAR</option>
								</optgroup>
								<optgroup label="STRING">
									<option<?= (strcasecmp($type,'CHAR')==0?' selected="selected"':'') ?>>CHAR</option>
									<option<?= (strcasecmp($type,'VARCHAR')==0?' selected="selected"':'') ?>>VARCHAR</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'TINYTEXT')==0?' selected="selected"':'') ?>>TINYTEXT</option>
									<option<?= (strcasecmp($type,'TEXT')==0?' selected="selected"':'') ?>>TEXT</option>
									<option<?= (strcasecmp($type,'MEDIUMTEXT')==0?' selected="selected"':'') ?>>MEDIUMTEXT</option>
									<option<?= (strcasecmp($type,'LONGTEXT')==0?' selected="selected"':'') ?>>LONGTEXT</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'BINARY')==0?' selected="selected"':'') ?>>BINARY</option>
									<option<?= (strcasecmp($type,'VARBINARY')==0?' selected="selected"':'') ?>>VARBINARY</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'TINYBLOB')==0?' selected="selected"':'') ?>>TINYBLOB</option>
									<option<?= (strcasecmp($type,'MEDIUMBLOB')==0?' selected="selected"':'') ?>>MEDIUMBLOB</option>
									<option<?= (strcasecmp($type,'BLOB')==0?' selected="selected"':'') ?>>BLOB</option>
									<option<?= (strcasecmp($type,'LONGBLOB')==0?' selected="selected"':'') ?>>LONGBLOB</option>
									<option disabled="disabled">-</option>
									<option<?= (strcasecmp($type,'ENUM')==0?' selected="selected"':'') ?>>ENUM</option>
									<option<?= (strcasecmp($type,'SET')==0?' selected="selected"':'') ?>>SET</option>
								</optgroup>
								<optgroup label="SPATIAL">
									<option<?= (strcasecmp($type,'GEOMETRY')==0?' selected="selected"':'') ?>>GEOMETRY</option>
									<option<?= (strcasecmp($type,'POINT')==0?' selected="selected"':'') ?>>POINT</option>
									<option<?= (strcasecmp($type,'LINESTRING')==0?' selected="selected"':'') ?>>LINESTRING</option>
									<option<?= (strcasecmp($type,'POLYGON')==0?' selected="selected"':'') ?>>POLYGON</option>
									<option<?= (strcasecmp($type,'MULTIPOINT')==0?' selected="selected"':'') ?>>MULTIPOINT</option>
									<option<?= (strcasecmp($type,'MULTILINESTRING')==0?' selected="selected"':'') ?>>MULTILINESTRING</option>
									<option<?= (strcasecmp($type,'MULTIPOLYGON')==0?' selected="selected"':'') ?>>MULTIPOLYGON</option>
									<option<?= (strcasecmp($type,'GEOMETRYCOLLECTION')==0?' selected="selected"':'') ?>>GEOMETRYCOLLECTION</option>
								</optgroup>
							</select>
						</td>
						<td>
							<input type="text" name="fieldLength[]" value="<?= $size ?>"/>
						</td>
						<td>
							<input type="text" name="fieldDefault[]" value="<?= $field['Default'] ?>" /> 
						</td>
					</tr>


					<?php } } ?>
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
