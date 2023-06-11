<?php
include 'koneksi.php';

    if ($_POST['add']) {
        $nama_tugas = $_POST ['nama_tugas'];
        $deadline = $_POST ['deadline'];

        $query = "INSERT INTO tugas_taliya VALUES(null, '$nama_tugas', '$deadline')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            // echo "Berhasil <a href='index.php'>home</a>";
            header("location: index.php");
        }
        else{
            echo $query;
        }
    // echo "tambah data <a href='index.php'>home</a>";
    }
     if ($_POST['edit']) {
        //  echo "edit data <a href='index.php'>home</a>";
            $id = $_POST['id_tugas'];
            $nama_tugas = $_POST['nama_tugas'];
            $deadline = $_POST['deadline'];

            $query = "UPDATE tugas_taliya SET nama_tugas = '$nama_tugas', deadline='$deadline' WHERE  id_tugas = '$id';";

            $sql = mysqli_query($conn,$query);
            header("location: index.php");
    }

if(isset($_GET['hapus'])){
    // echo "hapus data <a href='index.php'>home</a>";
    $id = $_GET['hapus'];
    $query = "DELETE FROM tugas_taliya WHERE id_tugas = '$id'; ";
    $sql = mysqli_query($conn,$query);
    if($sql){
    header("location: index.php");
    }
    else{
    echo $query;
    }
}

