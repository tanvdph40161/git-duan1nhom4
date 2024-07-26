<?php
    require('includes/header.php');
    function anh($arrstr,$height){
    //$arrstr la mang cac anh co dang anh1;anh2;anh3
    $arr = explode(';', $arrstr);
   }
?>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Khách hàng </th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Giá</th>
                    <th>Số lượng</th>                     
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php 
    require('../model/pdo.php');
    $sql_str = "SELECT 
    sanpham.name as sname,
    oder.id as idoder,
    taikhoan.user as user,
    taikhoan.tel as tel,
    taikhoan.address as address,
    oderdetail.price as price,
    oderdetail.quantity as quantity,
    oder.status as sstatus
    from sanpham join oderdetail on sanpham.idsp=oderdetail.idproduct 
    join oder on oderdetail.idoder=oder.id 
    join taikhoan on oder.iduser=taikhoan.iduser order by oder.id";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>

        
            <tr>
                <td><?=$row['idoder']?></td>
                <td><?=$row['sname']?></td>
                <td><?=$row['user']?></td>
                <td><?=$row['tel']?></td>
                <td><?=$row['address']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['quantity']?></td>
                <td><?=$row['sstatus']?></td>
                <td>
                    <a class="btn btn-warning" href="editdonhang.php?id=<?=$row['idoder']?>">Edit</a>  
                    <a class="btn btn-danger" 
                    href="deletedonhang.php?id=<?=$row['idoder']?>"
                    onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');">Delete</a>
                </td>
                
            </tr>
            <?php
    }
    ?>                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
         

      
<?php
require('includes/footer.php');
?>