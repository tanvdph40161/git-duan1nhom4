<?php

//lay id goi den
$delid = $_GET['iddm'];

//ket noi csdl
require('../model/pdo.php');

$sql_str = "DELETE from danhmuc where iddm=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê brands
header("location: listdm.php");
?>
