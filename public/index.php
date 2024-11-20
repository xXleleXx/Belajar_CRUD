<?php
require "function.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["search"])) {
  $mahasiswa = cari($_POST["keyword"]);
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

<body class="bg-gray-200">
  <div class="gap-[20px] mx-auto flex flex-col justify-center items-center">
    <h1 class="font-bold text-[50px]">Daftar Mahasiswa</h1>

    <div class="w-[85%] flex justify-between">
      <a href="tambah.php" class="">
        <button class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 font-semibold focus:ring-blue-500 focus:ring-offset-2 animate-fade-in duration-300 ease-in-out">Tambah Mahasiswa</button>
      </a>

      <form action="" method="post" class=" ">
        <input type="text" name="keyword" autocomplete="off" size="25" class="rounded-md px-2 py-1 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" name="search"
          class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 font-semibold focus:ring-blue-500 focus:ring-offset-2 animate-fade-in duration-300 ease-in-out">Search</button>
      </form>
    </div>

    <table class="w-[85%] bg-white rounded-lg shadow-md p-6 " cellpadding="10">
      <tr class="border-b border-b-gray-300 bg-gray-100">
        <th></th>
        <th class="p-2 px-6 text-left">Nama</th>
        <th class="p-2 text-left">NRP</th>
        <th class="p-2 text-left">Email</th>
        <th class="p-2 text-left">Jurusan</th>
        <th></th>
      </tr>

      <?php foreach ($mahasiswa as $mhs): ?>
        <tr class="border-b border-b-gray-200">
          <td><img src="images/<?= $mhs["gambar"] ?>" alt="" class="rounded-full h-[50px] w-[50px] bg-cover object-cover"></td>
          <td class=" p-2 px-6 text-left"><?= $mhs["nama"] ?></td>
          <td class=" p-2 text-left"><?= $mhs["nrp"] ?></td>
          <td class=" p-2 text-left"><?= $mhs["email"] ?></td>
          <td class=" p-2 text-left"><?= $mhs["jurusan"] ?></td>
          <td class=" p-2 text-center">
            <a href="edit.php?id=<?= $mhs["id"] ?>">
              <button class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 animate-fade-in duration-300 ease-in-out">edit</button>
            </a>
            <a href="hapus.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Apakah Anda Yakin ?')">
              <button class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 animate-fade-in duration-300 ease-in-out">delete</button>
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
    <br>
</body>
</div>

</html>