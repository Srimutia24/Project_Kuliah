<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
</head>
<body>
    <h1>BUKU TAMU</h1>
    <hr>
    <form action="proses_bukutamu.php" method="post">
        <pre>
            Nama : <input type="text" name="nama" size="25" maxlength="50">
            Email Address : <input type="text" name="email" size="25" maxlength="50">
            Komentar : <textarea type="text" name="komentar" size="25" cols="40" rows="5">
</textarea>
<input type="submit" value="Kirim">
<input type="reset"  value="Ulangi">
</pre>
    </form>
</body>
</html>