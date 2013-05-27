
<!DOCTYPE html>
<html>
<head>
	<title>Personal Charity Fundraisers :: Give As One</title>

	<link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,600|Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
	<?php require 'resources/css/straightedge/styles.php'; ?>

	<!-- The template to display files available for upload -->
	<script id="template-upload" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
		    <tr class="template-upload fade">
		        <td>
		            <span class="preview"></span>
		        </td>
		        <td>
		            <p class="name">{%=file.name%}</p>
		            {% if (file.error) { %}
		                <div><span class="label label-important">Error</span> {%=file.error%}</div>
		            {% } %}
		        </td>
		        <td>
		            <p class="size">{%=o.formatFileSize(file.size)%}</p>
		            {% if (!o.files.error) { %}
		                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
		            {% } %}
		        </td>
		        <td>
		            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
		                <button class="btn btn-primary start">
		                    <i class="icon-upload icon-white"></i>
		                    <span>Start</span>
		                </button>
		            {% } %}
		            {% if (!i) { %}
		                <button class="btn btn-warning cancel">
		                    <i class="icon-ban-circle icon-white"></i>
		                    <span>Cancel</span>
		                </button>
		            {% } %}
		        </td>
		    </tr>
		{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
		    <tr class="template-download fade">
		        <td>
		            <span class="preview">
		                {% if (file.thumbnail_url) { %}
		                    <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
		                {% } %}
		            </span>
		        </td>
		        <td>
		            <p class="name">
		                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
		            </p>
		            {% if (file.error) { %}
		                <div><span class="label label-important">Error</span> {%=file.error%}</div>
		            {% } %}
		        </td>
		        <td>
		            <span class="size">{%=o.formatFileSize(file.size)%}</span>
		        </td>
		        <td>
		            <button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
		                <i class="icon-trash icon-white"></i>
		                <span>Delete</span>
		            </button>
		            <input type="checkbox" name="delete" value="1" class="toggle">
		        </td>
		    </tr>
		{% } %}
	</script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<?php require 'resources/js/straightedge/scripts.php'; ?>

</head>
<body>
	<header>
		<div id="fundraiserSummary">
			<h3>Fundraiser Summary</h3>
			<ul>
				<li>
					<b>Total Donations:</b> <br />
					$78,038
				</li>
				<li>
					<b>Donation Goal:</b> <br />
					$150,000
				</li>
				<li>
					<b>Gift Aid:</b> <br />
					$324.24
				</li>
				<li>
					<b>Donation Count:</b> <br />
					40
				</li>
			</ul>
		</div>
		<div id="fundraiserName">Relay for life 2013</div>
		<div id="charityName">Fundraising for <b>Relay for life</b><span class="editTrigger"><a href="#fundHeader_edit" class="editTriggerEdit">Edit</a></span></div>
	</header>
	<div id="pageWrap">
		<div id="donationStatus" class="clear">
			<div id="donateButton">
				Donate Now
			</div>
			<div id="progressIndicatorWrapper">
				<div id="progressIndicator">
					52%
					<div id="progressTooltip">
						$78,038 / $150,000
					</div>
				</div>
			</div>
		</div>
		<div class="slideHeader">
			<ul class="liteSlide">
				<li style="background-image: url('../images/fund/slide1.jpg');"></li>
				<li style="background-image: url('../images/fund/slide1.jpg');"></li>
				<li style="background-image: url('../images/fund/slide1.jpg');"></li>
			</ul>
			<div id="donorList">
				<h4>Recent Donations</h4>
				<ul>
					<?php $i = 50; while($i) { ?>
					<li>
						<div class="donationAmount">25.00</div>
						<div class="donorName">Noel Brady</div>
					</li>
					<li>
						<div class="donationAmount">125.00</div>
						<div class="donorName">Alex Abrahamovich</div>
					</li>
					<li>
						<div class="donationAmount">225.00</div>
						<div class="donorName">Vivian James</div>
					</li>
					<li>
						<div class="donationAmount">125.00</div>
						<div class="donorName">Nigel Saldanha</div>
					</li>
					<li>
						<div class="donationAmount">125.00</div>
						<div class="donorName">Patrick Downey</div>
					</li>
					<li>
						<div class="donationAmount">125.00</div>
						<div class="donorName">Siobahn Keane</div>
					</li>
					<?php $i--; } ?>
				</ul>
				<div id="donorListTrigger">View All Donations</div>
			</div>
			<span class="editTrigger"><a href="#fundSlider_edit" class="editTriggerEdit">Edit</a><a href="#fundImages_add" class="editTriggerAdd uploadTrigger">Add</a></span>
		</div>
		<div class="bodyContent">
			<h3>About Fundraiser <span class="editTrigger"><a href="#fundHeader_edit" class="editTriggerEdit">Edit</a></span></h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			</p>
			<p>
				<b>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

			<h3>Gallery <span class="editTrigger"><a href="#fundGallery_edit" class="editTriggerEdit">Edit</a><a href="#fundImages_add" class="editTriggerAdd uploadTrigger">Add</a></span></h3>
			<ul class="imageGallery">
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
				<li><a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg"><img src="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg" /></a></li>
			</ul>
		</div>
		<div class="sideContent">
			<h3>About Charity</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 

			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<footer>
		<div class="third">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">About Us</a></li>
				<li><a href="">Contact Us</a></li>
			</ul>
		</div>
		<div class="third">
			<ul>
				<li><a href="">How It Works</a></li>
				<li><a href="">Privacy Policy</a></li>
				<li><a href="">Terms of Service</a></li>
			</ul>
		</div>
		<div class="third">
			<span class="bigText">Copyright 2013 <br />
				&copy;Give As One <br /></span>
				<span class="subscript">Website designed, built &amp; maintained by <a href="http://redatomstudios.com">redAtom Studios</a></span>
			</div>
			<div class="clear"></div>
		</footer>
		<div class="modalForm" id="fundHeader_edit">
			<form>
				<div class="formBlock">
					<div class="elemLabel">
						<label for="">Fundraiser Name</label>
					</div>
					<div class="element">
						<input type="text" name="fundTitle" />
					</div>
				</div>
				<div class="formBlock">
					<div class="elemLabel">
						<label for="">Fundraising For</label>
					</div>
					<div class="element">
						<input type="text" name="fundCharity" />
					</div>
				</div>
				<div class="formBlock">
					<div class="elemLabel">
						<label for="">Fundraiser Description</label>
					</div>
					<div class="element">
						<textarea name="fundDescription"></textarea>
					</div>
				</div>
				<div class="formBlock">
					<div class="elemLabel">
					</div>
					<div class="element">
						<input type="button" value="Save" />
					</div>
				</div>
			</form>
		</div>
		<div class="modalForm" id="fundSlider_edit">
			Uploaded images:
			<form>
				<ul class="imageGallery">
					<?php for( $i = 0; $i < 20; $i++ ) { ?>
					<li>
						<a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg">
							<div class="imgPreview" style="background-image: url('http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg');"></div>
						</a>
						<input type="checkbox" value="imageUrlGoesHereForDeletion" />
					</li>
					<?php } ?>
				</ul>
				<input type="submit" style="margin-left: 8px" value="Delete Selected Images" />
			</form>
		</div>
		<div class="modalForm" id="fundGallery_edit">
			Uploaded images:
			<form>
				<ul class="imageGallery">
					<?php for( $i = 0; $i < 20; $i++ ) { ?>
					<li>
						<a rel="lightbox-gallery" href="http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg">
							<div class="imgPreview" style="background-image: url('http://25.media.tumblr.com/9e82386b77170cb02116903c1a9b9d19/tumblr_mis6ppDzIx1raxjpco1_500.jpg');"></div>
						</a>
						<input type="checkbox" value="imageUrlGoesHereForDeletion" />
					</li>
					<?php } ?>
				</ul>
				<input type="submit" style="margin-left: 8px" value="Delete Selected Images" />
			</form>
		</div>
		<div class="modalForm" id="fundImages_add">
			<div class="fUpload container">
				Upload More Images:
		    <!-- The file upload form used as target for the file upload widget -->
		    <form class="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
		        <!-- Redirect browsers with JavaScript disabled to the origin page -->
		        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
		        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		        <div class="row fileupload-buttonbar">
		            <div class="span7">
		                <!-- The fileinput-button span is used to style the file input field as button -->
		                <button class="btn btn-success fileinput-button">
		                    <i class="icon-plus icon-white"></i>
		                    <span>Add files...</span>
		                    <input type="file" name="files[]" multiple>
		                </button>
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
		                <!-- The loading indicator is shown during file processing -->
		                <span class="fileupload-loading"></span>
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
		        <!-- The table listing the files available for upload/download -->
		        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
		    </form>
		    <br>
			</div>
		</div>

		<!-- modal-gallery is the modal dialog used for the image gallery -->
		<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd" tabindex="-1">
		    <div class="modal-header">
		        <a class="close" data-dismiss="modal">&times;</a>
		        <h3 class="modal-title"></h3>
		    </div>
		    <div class="modal-body"><div class="modal-image"></div></div>
		    <div class="modal-footer">
		        <a class="btn modal-download" target="_blank">
		            <i class="icon-download"></i>
		            <span>Download</span>
		        </a>
		        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
		            <i class="icon-play icon-white"></i>
		            <span>Slideshow</span>
		        </a>
		        <a class="btn btn-info modal-prev">
		            <i class="icon-arrow-left icon-white"></i>
		            <span>Previous</span>
		        </a>
		        <a class="btn btn-primary modal-next">
		            <span>Next</span>
		            <i class="icon-arrow-right icon-white"></i>
		        </a>
		    </div>
		</div>
	</body>
	</html>

