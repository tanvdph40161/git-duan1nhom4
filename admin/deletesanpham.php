<?php

//lay id goi den
$delid = $_GET['idsp'];

//ket noi csdl
require('../model/pdo.php');

$sql_str = "DELETE from sanpham where idsp=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê brands
header("location: listsp.php");
?>
