<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Login</title>
	<style>
	.logWrap {
		height: 200px;
		width: 500px;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		display: table;
	}

	.tCell {
		display: table-cell;
		padding: 20px;
		vertical-align: middle;
	}

	input {
		padding: 10px;
		width: 200px;
		float: right;
		border-radius: 5px;
		border-width: 1px;
		outline: none;
	}

	input[type="submit"] {
		width: 100px;
	}
	</style>
</head>
<body>
	<div class="logWrap">
		<div class="tCell">
			<?= form_open('dash/login') ?>
				<input name="uName" type="text" placeholder="Username" />
				<input name="pWord" type="password" placeholder="Password" />
				<input type="submit" />
			<?= form_close() ?>
		</div>
		<div class="tCell">
			<img src="<?= base_url() ?>resources/branding/headerLogo.png" width="200" />
		</div>
	</div>
</body>
</html>