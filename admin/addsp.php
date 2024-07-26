<?php

// echo "xin chao";


require('../model/pdo.php');

//lay du lieu tu form
$name = $_POST['name'] ;
$price = $_POST['price'] ;
$mota = $_POST['mota'] ;
$quantity = $_POST['quantity'] ;
$status = $_POST['status'] ;
$danhmuc = $_POST['danhmuc'] ;

//xu ly hinh anh
$imgs = '';
if (isset($_FILES['anhs']) && is_array($_FILES['anhs']['name'])) {
    $countfiles = count($_FILES['anhs']['name']);
    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['anhs']['name'][$i];

        ## Location
        $location = "uploads/" . uniqid() . $filename;
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        ## File upload allowed extensions
        $valid_extensions = array("jpg", "jpeg", "png");

        ## Check file extension
        if (in_array($extension, $valid_extensions)) {
            ## Upload file
            if (move_uploaded_file($_FILES['anhs']['tmp_name'][$i], $location)) {
                $imgs .= $location . ";";
            }
        }
    }
    $imgs = rtrim($imgs, ";");
}

// cau lenh them vao bang
$sql_str = "INSERT INTO sanpham (`name`, `img`, `price`, `mota`, `quantity`, `status`, `iddm`) VALUES 
    ('$name', '$imgs', '$price', '$mota', '$quantity', '$status', '$danhmuc')";


//thuc thi cau lenh
mysqli_query($conn, $sql_str);

//tro ve trang 
header("location: listsp.php");
?>