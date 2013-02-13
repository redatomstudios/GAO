	<!-- jQuery UI styles -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/base/jquery-ui.css" id="theme">
	<!-- CSS to style the file input field as button and adjust the jQuery UI progress bars -->
	<link rel="stylesheet" href="<?= base_url() ?>uploader/css/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="<?= base_url() ?>uploader/css/jquery.fileupload-ui-noscript.css"></noscript>
	<?php

	$identifier = random_string('alnum', 16);

	?>
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

					<?php if(!isset($fields)) { ?>
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
						
						if($field['Field'] == 'id' || $field['Field'] == 'timestamp')
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
			<input type="hidden" name="identifier" value="<?= $identifier ?>" />
			<p>
				<?php if(!isset($fields)) { ?>
					<button type="button" id="addField">Add Field</button> or leave the field blank to ignore it. 
				<?php } ?>
			</p>
			<?= form_close() ?>

			<h2>
				CSS, JS and Image Files:
			</h2>
			<table style="font-size: 0.7em" class="centered">
				<tbody>
					<tr>
						<td>
					    <form id="fileupload" class="fileupload" method="POST" enctype="multipart/form-data">
					    		<input type="hidden" name="identifier" value="<?= $identifier ?>" />
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span7">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <i class="icon-plus icon-white"></i>
					                    <span>Add files...</span>
					                    <input type="file" name="files[]" multiple>
					                </span>
					                <button type="submit" class="btn btn-primary start">
					                    <i class="icon-upload icon-white"></i>
					                    <span>Start upload</span>
					                </button>
					                <button type="reset" class="btn btn-warning cancel">
					                    <i class="icon-ban-circle icon-white"></i>
					                    <span>Cancel upload</span>
					                </button>
					                <button type="button" class="btn btn-danger delete">
					                    <i class="icon-trash icon-white"></i>
					                    <span>Delete</span>
					                </button>
					                <input type="checkbox" class="toggle">
					            </div>
					            <!-- The global progress information -->
					            <div class="span5 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="bar" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress information -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <!-- The loading indicator is shown during file processing -->
					        <div class="fileupload-loading"></div>
					        <br>
					        <!-- The table listing the files available for upload/download -->
					        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
					    </form>
						</td>
					</tr>
				</tbody>
			</table>

			<p>
				<button type="button" onclick="javascript: document.forms[0].submit();">Save Template</button> 
			</p>
		</div>

		<!-- The template to display files available for upload -->
		<script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			    <tr class="template-upload fade">
			        <td class="preview"><span class="fade"></span></td>
			        <td class="name"><span>{%=file.name%}</span></td>
			        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			        {% if (file.error) { %}
			            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
			        {% } else if (o.files.valid && !i) { %}
			            <td>
			                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
			            </td>
			            <td class="start">{% if (!o.options.autoUpload) { %}
			                <button class="btn btn-primary">
			                    <i class="icon-upload icon-white"></i>
			                    <span>Start</span>
			                </button>
			            {% } %}</td>
			        {% } else { %}
			            <td colspan="2"></td>
			        {% } %}
			        <td class="cancel">{% if (!i) { %}
			            <button class="btn btn-warning">
			                <i class="icon-ban-circle icon-white"></i>
			                <span>Cancel</span>
			            </button>
			        {% } %}</td>
			    </tr>
			{% } %}
		</script>
		<!-- The template to display files available for download -->
		<script id="template-download" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			    <tr class="template-download fade">
			        {% if (file.error) { %}
			            <td></td>
			            <td class="name"><span>{%=file.name%}</span></td>
			            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
			        {% } else { %}
			            <td class="preview">{% if (file.thumbnail_url) { %}
			                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
			            {% } %}</td>
			            <td class="name">
			                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
			            </td>
			            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			            <td colspan="2"></td>
			        {% } %}
			        <td class="delete">
			            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
			                <i class="icon-trash icon-white"></i>
			                <span>Delete</span>
			            </button>
			            <input type="checkbox" name="delete" value="1">
			        </td>
			    </tr>
			{% } %}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
		<!-- The Templates plugin is included to render the upload/download listings -->
		<script src="<?= base_url() ?>uploader/js/tmpl.min.js"></script>
		<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
		<script src="<?= base_url() ?>uploader/js/load-image.min.js"></script>
		<!-- The Canvas to Blob plugin is included for image resizing functionality -->
		<script src="<?= base_url() ?>uploader/js/canvas-to-blob.min.js"></script>
		<!-- jQuery Image Gallery -->
		<script src="<?= base_url() ?>uploader/js/jquery.image-gallery.min.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="<?= base_url() ?>uploader/js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="<?= base_url() ?>uploader/js/jquery.fileupload.js"></script>
		<!-- The File Upload file processing plugin -->
		<script src="<?= base_url() ?>uploader/js/jquery.fileupload-fp.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="<?= base_url() ?>uploader/js/jquery.fileupload-ui.js"></script>
		<!-- The File Upload jQuery UI plugin -->
		<script src="<?= base_url() ?>uploader/js/jquery.fileupload-jui.js"></script>
		<!-- The main application script -->
		<script src="<?= base_url() ?>uploader/js/main.js"></script>
		<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
		<!--[if gte IE 8]><script src="<?= base_url() ?>js/cors/jquery.xdr-transport.js"></script><![endif]-->
		<script>
			// Script snippet to add a new row when [Add Field] is clicked
			$('#addField').click(function() {
				var rowContent = $('table#fieldList').find('tr')[1];
				$('table#fieldList').append('<tr>' + $(rowContent).html() + '</tr>');
			});
		</script>
	</div>
