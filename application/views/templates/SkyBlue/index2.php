<!DOCTYPE html>
<html>
	<head>
		<title><?= $pageData['pageTitle'] ?> :: Give As One</title>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
		<style>
			<?php require 'resources/css/' . $templateName . '/styles.php'; ?>
		</style>
	</head>
	<body>
		<header>
			<img src="resources/images/<?= $templateName ?>/headerLogo.png" id="headerLogo" />
			<ul id="headerNav">
				<li><a href="">Logout</a></li>
				<li><a href="">Your Fundraiser</a></li>
				<li>James C. Maxwell</li>
			</ul>
		</header>
		<div id="pageWrap">
			<div class="pageContent">
				<ul class="liteSlide">
					<li style="background-image: url('resources/images/<?= $templateName ?>/slide_2.jpg');"></li>
					<li style="background-image: url('resources/images/<?= $templateName ?>/slide_1.jpg');"></li>
					<li style="background-image: url('resources/images/<?= $templateName ?>/slide_3.jpg');"></li>
				</ul>
				<div class="fullModule">
					<h2><?= $pageData['pageHeading'] ?></h2>
					<?= $pageData['pageContent'] ?>
				</div>
			</div>
			<div id="sidebar">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="how.php">How It Works</a></li>
						<li><a href="terms.php">Terms of Service</a></li>
						<li><a href="privacy.php">Privacy Policy</a></li>
						<li><a href="register.php">Register Now</a></li>
					</ul>
				</nav>
				<div class="sideModule">
					<h2>Success Stories</h2>
					<h3>Your Fundraiser</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<h3>Another Fundraiser</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>
				<div class="sideModule">
					<h2>Social Activity</h2>
					<h3>Twitter</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<h3>Facebook</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>
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
		<script>
			<?php require 'resources/js/' . $templateName . '/scripts.php'; ?>
		</script>
	</body>
</html>