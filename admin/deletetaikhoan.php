<?php

//lay id goi den
$delid = $_GET['iduser'];

//ket noi csdl
require('../model/pdo.php');

$sql_str = "DELETE from taikhoan where iduser=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê brands
header("location: listuser.php");
?>
