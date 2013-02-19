		<div class="sidebar">
			<div class="centered">
				<img src="<?= base_url() ?>resources/branding/headerLogo.png" id="headerLogo" height="200" />
			</div>
			<nav>
				<ul>
					<li<?= $thisPage == "dashboard" ? ' class="current"' : "" ?>><a href="<?= base_url() ?>dash">Dashboard</a></li>
					<li<?= $thisPage == "templates" ? ' class="current"' : "" ?>><a href="<?= base_url() ?>dash/templates">Templates</a></li>
					<li<?= $thisPage == "pages" ? ' class="current"' : "" ?>><a href="<?= base_url() ?>dash/pages">Pages</a></li>
					<li class="spacer"></li>
					<li><a href="<?= base_url() ?>dash/logout">Logout</a></li>
				</ul>
			</nav>
		</div>
