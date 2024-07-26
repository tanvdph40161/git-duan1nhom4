<?php

//lay id goi den
$delid = $_GET['id'];

//ket noi csdl
require('../model/pdo.php');

$sql_str = "DELETE from donhang where id=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê brands
header("location: listdh.php");
?>
