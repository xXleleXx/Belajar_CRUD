<?php
require "function.php";

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            window.alert('Data Berhasil Ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            window.alert('Data Gagal Ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</head>

<body class="bg-gray-200 flex items-center justify-center h-screen flex-col">
  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Tambah Mahasiswa</h2>

    <form class="space-y-4" action="" method="post" enctype="multipart/form-data">
      <div>
        <label class="block text-gray-700 font-medium mb-2" for="nama">Nama : </label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nama">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2" for="nrp">NRP : </label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nrp">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2" for="email">Email : </label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="email">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2" for="jurusan">Jurusan : </label>
        <input class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="jurusan">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2" for="gambar">Gambar :</label>
        <input type="file" name="gambar" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-200  file:hover:bg-blue-200 file:hover:text-blue-500 file:focus:bg-gray-400 file:animate-fade-in file:duration-300 file:ease-in-out" />
      </div>

      <div>
        <button class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mb-2 animate-fade-in duration-300 ease-in-out" type="submit" name="submit">Submit</button>
      </div>
    </form>
    <a href="index.php">
      <button class="w-full bg-red-500 text-white font-semibold py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 animate-fade-in duration-300 ease-in-out">Batal</button>
    </a>
  </div>

</body>

</html>