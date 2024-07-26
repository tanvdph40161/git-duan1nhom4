<?php
    require('includes/header.php');
?>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bình luận</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung bình luận</th>                     
                    <th>User</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php 
    require('../model/pdo.php');
    $sql_str = "SELECT sanpham.name as sname,
    sanpham.idsp as idsp,
     binhluan.noidung as noidung,
     binhluan.id as id,
     taikhoan.user as user FROM sanpham JOIN binhluan on sanpham.idsp=binhluan.idpro 
     JOIN taikhoan ON binhluan.iduser=taikhoan.iduser ORDER BY sanpham.name";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>

        
            <tr>
                <td><?=$row['idsp']?></td>
                <td><?=$row['sname']?></td>
                <td><?=$row['noidung']?></td>
                <td><?=$row['user']?></td>
                <td>
                    <a class="btn btn-danger" 
                    href="deletebinhluan.php?id=<?=$row['id']?>"
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