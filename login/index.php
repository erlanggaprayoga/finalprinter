<!DOCTYPE html>
<html>
<head>
	<title>Toko Printer</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<h1>Selamat Datang Di Toko Printer <br/> Erlangga </h1>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login ~</p>

		<form action="process.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username atau email ..">

			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">

			<input type="submit" class="tombol_login" value="LOGIN">

			<br/>
			<br/>
			<center>
				<a class="link" href="../index.php">kembali</a>
			</center>
		</form>
		
	</div>

</body>
</html>