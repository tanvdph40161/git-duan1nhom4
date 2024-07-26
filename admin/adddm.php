<?php

   
    require('../model/pdo.php');

    //lay du lieu tu form
    $name = $_POST['name'];
    $status = $_POST['status'];
  
    
    // cau lenh them vao bang
    $sql_str = "INSERT INTO danhmuc (`name`, `status`) VALUES ('$name', '$status')";


    //thuc thi cau lenh
    mysqli_query($conn, $sql_str);

    //tro ve trang 
    header("location: listdm.php");
?>