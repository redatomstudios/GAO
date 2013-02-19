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
	}

	input[type="text"], input[type="password"] {
		width: 200px;
	}

	input[type="submit"] {
		width: 100px;
		float: right;
	}
	</style>
</head>
<body>
	<div class="logWrap">
		<div class="tCell">
			<form>
				<input type="text" placeholder="Username" />
				<input type="password" placeholder="Password" />
				<input type="submit" />
			</form>
		</div>
		<div class="tCell">
			<img src="<?= base_url() ?>resources/branding/headerLogo.png" width="200" />
		</div>
	</div>
</body>
</html>