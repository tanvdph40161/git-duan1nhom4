<?php
    require('includes/header.php');
?>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Khách hàng</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Iduser</th>
                    <th>User</th>
                    <th>Email</th>                        
                    <th>Address</th>
                    <th>Tel</th>
                    <th>Role</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php 
    require('../model/pdo.php');
    $sql_str = "SELECT * FROM taikhoan  ORDER BY iduser";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>      
            <tr>
                <td><?=$row['iduser']?></td>
                <td><?=$row['user']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['address']?></td>
                <td><?=$row['tel']?></td>
                <td><?=$row['role']?></td>
                <td>
                    <a class="btn btn-danger" 
                    href="deletetaikhoan.php?iduser=<?=$row['iduser']?>"
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