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
						<?php
							foreach($navItems as $thisNav) {
						?>
						<li><a href="<?= base_url() ?>/<?= $thisNav['pageName'] ?>"><?= $thisNav['pageTitle'] ?></a></li>
						<?php
							}
						?>
					</ul>
				</nav>
			</div>
		</div>
		<footer>
			<div class="third">
				<?php

				$firstGroup = array();
				$secondGroup = array();
				foreach($navItems as $index => $thisNav) {
					if( ($index + 1) % 2 ) {
						$firstGroup[] = $thisNav;
					} else {
						$secondGroup[] = $thisNav;
					}
				}

				?>
				<ul>
					<?php
					foreach($firstGroup as $thisNav) {
					?>
					<li><a href="<?= base_url() ?>/<?= $thisNav['pageName'] ?>"><?= $thisNav['pageTitle'] ?></a></li>
					<?php
					}
					?>
				</ul>
			</div>
			<div class="third">
				<ul>
					<?php
					foreach($secondGroup as $thisNav) {
					?>
					<li><a href="<?= base_url() ?>/<?= $thisNav['pageName'] ?>"><?= $thisNav['pageTitle'] ?></a></li>
					<?php
					}
					?>
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