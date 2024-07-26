<?php
    require('includes/header.php');
    function anh($arrstr,$height){
        //$arrstr la mang cac anh co dang anh1;anh2;anh3
        //tach chuoi nay thanh mang - tach voi ;
        $arr = explode(';', $arrstr);
        return "<img src='$arr[0]' height='$height' />";
    }
?>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh </th>
                    <th>Mô tả </th>
                    <th>Danh mục</th>
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
    sanpham.idsp as idsp,
    sanpham.name as name,
    img,
    sanpham.mota as mota,
    sanpham.price as price,
    sanpham.quantity as quantity,
    sanpham.status as status,
    danhmuc.name as namedm
    from sanpham join danhmuc on sanpham.iddm=danhmuc.iddm order by sanpham.idsp";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>

        
            <tr>
                <td><?=$row['idsp']?></td>
                <td><?=$row['name']?></td>
                <td><?=anh($row['img'], "100px")?></td>
                <td><?=$row['mota']?></td>
                <td><?=$row['namedm']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['quantity']?></td>
                <td><?=$row['status']?></td>
                <td>
                    <a class="btn btn-warning" href="editsanpham.php?idsp=<?=$row['idsp']?>">Edit</a>  
                    <a class="btn btn-danger" 
                    href="deletesanpham.php?idsp=<?=$row['idsp']?>"
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