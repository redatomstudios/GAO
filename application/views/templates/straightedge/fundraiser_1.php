<!DOCTYPE html>
<html>
<head>
	<title>Personal Charity Fundraisers :: Give As One</title>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Advent+Pro:400,600|Prosto+One|Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/general.css" rel="stylesheet" />
	<link href="css/header.css" rel="stylesheet" />
	<link href="css/sidebar.css" rel="stylesheet" />
	<link href="css/slider.css" rel="stylesheet" />
	<link href="css/content.css" rel="stylesheet" />
	<link href="css/footer.css" rel="stylesheet" />
	<link href="css/slimbox2.css" rel="stylesheet" />
	<link href="css/nyroModal.css" rel="stylesheet" />
	<!-- jQuery UI styles -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/base/jquery-ui.css" id="theme">
	<!-- CSS to style the file input field as button and adjust the jQuery UI progress bars -->
	<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

	<script src="js/jquery.1.9.0.min.js"></script>
	<script src="js/slimbox2.js"></script>
	<script src="js/jquery.nyroModal.custom.min.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/canvas-to-blob.min.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script src="js/jquery.fileupload-fp.js"></script>
	<script src="js/jquery.fileupload-ui.js"></script>
	<script src="js/jquery.image-gallery.min.js"></script>
	<script src="js/jquery.fileupload-jui.js"></script>
	<script src="js/jquery.iframe-transport.js"></script>
	<script src="js/load-image.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/tmpl.min.js"></script>
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

	<script src="js/h2o.js"></script>
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
		<div id="charityName">Fundraising for <b>Relay for life</b><span class="editTrigger"><a href="#fundHeader_edit">Edit</a></span></div>
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
			<span class="editTrigger"><a href="#fundSlider_edit">Edit</a></span>
		</div>
		<div class="bodyContent">
			<h3>About Fundraiser <span class="editTrigger"><a href="#fundBody_edit">Edit</a></span></h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			</p>
			<p>
				<b>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

			<h3>Gallery <span class="editTrigger"><a href="#fundGallery_edit">Edit</a></span></h3>
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
					</div>
					<div class="element">
						<input type="button" value="Save" />
					</div>
				</div>
			</form>
		</div>
		<div class="modalForm" id="fundBody_edit">
			<form>
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
		<div class="modalForm" id="fundGallery_edit">
			Uploaded images:
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
			Add more images:
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
		</div>
		<div class="modalForm" id="fundSlider_edit">
			Uploaded images:
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
			Add more images:
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
		</div>

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
	</body>
	</html>

