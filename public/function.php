<?php 

$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data){
  global $conn;
  
  $nama = htmlspecialchars($data["nama"]);
  $nrp = htmlspecialchars($data["nrp"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = upload();

  if (empty($nama) || empty($nrp) || empty($email) || empty($jurusan)) {
    echo "<script>alert('Semua Field harus diisi')</script>";
    return false;
  } 

  if(!$gambar) {
    return false;
  }

  $query = "INSERT INTO mahasiswa VALUES (
            0,
            '$nama',
            '$nrp',
            '$email',
            '$jurusan',
            '$gambar')";

  mysqli_query( $conn,$query);   
  
  return mysqli_affected_rows($conn);
}

function hapus($id) {
  global $conn;
  $file = query("SELECT gambar FROM mahasiswa WHERE id = $id")[0];

  $query = "DELETE FROM mahasiswa WHERE id = $id";
  mysqli_query($conn, $query);
  
  if($file["gambar"] != "placeholder.png"){
    unlink("images/" . $file["gambar"]);
  }

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $data = query("SELECT * FROM mahasiswa WHERE
                 nama LIKE '%$keyword%' OR
                 nrp LIKE '%$keyword%' OR
                 email LIKE '%$keyword%' OR
                 jurusan LIKE '%$keyword%'");
  return $data;
}

function edit($id, $data) {
  global $conn;

  $dataAwal = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

  $nama = empty($data["nama"]) ? $dataAwal["nama"] : htmlspecialchars($data["nama"]);
  $nrp = empty($data["nrp"]) ? $dataAwal["nrp"] : htmlspecialchars($data["nrp"]);
  $email = empty($data["email"]) ? $dataAwal["email"] : htmlspecialchars($data["email"]);
  $jurusan = empty($data["jurusan"]) ? $dataAwal["jurusan"] : htmlspecialchars($data["jurusan"]);
  // $gambar = upload() === "placeholder.png" ? $dataAwal["gambar"] : upload();

  $gambar = upload();
  if($gambar != "placeholder.png") {
    if($dataAwal["gambar"] != "placeholder.png") {
      unlink("images/" . $dataAwal["gambar"]);
    }
  } else {
    $gambar = $dataAwal["gambar"];
  }
  
  $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload() {
  $namaFile = $_FILES["gambar"]["name"];
  $tipeFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
  $error = $_FILES["gambar"]["error"];
  $ukuranFile = $_FILES["gambar"]["size"];
  $tmpName = $_FILES["gambar"]["tmp_name"];

  //cek apakah sudah mengupload gambar
  if($error === 4) {
    echo "<script>alert('Tidak ada file yang di upload!')</script>";
    $namaFile = "placeholder.png";
  } 

  //cek ukuran gambar (max 5mb)
  if($ukuranFile > 500000) {
    echo "<script>alert('ukuran gambar terlalu besar')</script>";
    $namaFile = "placeholder.png";
  }

  //cek apakah fiie gambar
  $tipeValid = ["jpg", "png", "jpeg"];
  if(!in_array($tipeFile, $tipeValid)) {
    echo "<script>alert('File bukan berupa gambar')</script>";
    $namaFile = "placeholder.png";
  }

  //generate nama file baru
  if($namaFile != "placeholder.png") {
    $namaFileBaru = uniqid();
    $namaFileBaru = $namaFileBaru . "." . $tipeFile;
  } else {
    $namaFileBaru = "placeholder.png";
  }

  move_uploaded_file($tmpName, "images/" . $namaFileBaru);
  return $namaFileBaru;
}