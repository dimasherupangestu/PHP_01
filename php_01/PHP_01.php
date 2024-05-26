<?php

// Deklarasi variabel untuk menyimpan data formulir
  $nama = "";
  $alamat = "";
  $nomorTelepon = "";
  $jenisKelamin = "";

// Deklarasi variabel untuk menampung pesan error
$error = ""; // Menyatukan semua pesan error

// Memproses data formulir jika tombol submit ditekan
if (isset($_POST['submit'])) {
  // Menangkap data dari formulir
  $nama = trim($_POST['nama']);
  $alamat = trim($_POST['alamat']);
  $nomorTelepon = trim($_POST['nomorTelepon']);
  $jenisKelamin = $_POST['jenisKelamin'];

  // Validasi data
  if (empty($nama)) {
    $error .= "Nama harus diisi<br>";
  } else if (!preg_match("/^[a-zA-Z ]+$/", $nama)) {
    $error .= "Nama hanya boleh berisi huruf dan spasi<br>";
  }

  if (empty($alamat)) {
    $error .= "Alamat harus diisi<br>";
  }

  if (empty($nomorTelepon)) {
    $error .= "Nomor telepon harus diisi<br>";
  } else if (!preg_match("/^[0-9]+$/", $nomorTelepon)) {
    $error .= "Nomor telepon hanya boleh berisi angka<br>";
  }

  if ($jenisKelamin == "") {
    $error .= "Jenis kelamin harus dipilih<br>";
  }

  // Jika tidak ada error, simpan data ke database (dalam contoh ini, data hanya dicetak ke layar)
  if (empty($error)) {
    echo "Nama: $nama<br>";
    echo "Alamat: $alamat<br>";
    echo "Nomor telepon: $nomorTelepon<br>";
    echo "Jenis kelamin: $jenisKelamin<br>";
  } else {
    // Menampilkan pesan error
    echo "<p style='color: red;'>Ada beberapa kesalahan:</p>";
    echo "<ul>";
      echo $error;
    echo "</ul>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Formulir Sederhana</title>
</head>
<body>
  <div class="container">
  <h1>Formulir Pendaftaran</h1>
  <form  method="post">
    <label class="label" for="nama">Nama:</label>
    <input class="input" type="text" required id="nama" name="nama" value="<?php echo $nama; ?>">

    <label class="label" for="alamat">Alamat:</label>
    <textarea id="alamat" required name="alamat" rows="5"><?php echo $alamat; ?></textarea>

    <label class="label" for="nomorTelepon">Nomor Telepon:</label>
    <input class="input" required type="text" id="nomorTelepon" name="nomorTelepon" value="<?php echo $nomorTelepon; ?>">

    <label class="label" for="jenisKelamin">Jenis Kelamin:</label>
    <select required id="jenisKelamin" name="jenisKelamin">
      <option value="">Pilih</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  <br>
    <button type="submit" name="submit">Submit</button>
  </form>
  </div>
</body>
</html>

