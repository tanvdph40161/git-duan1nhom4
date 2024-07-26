<?php
    require('includes/header.php');
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
                    <th>Tên danh mục</th>                     
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php 
    require('../model/pdo.php');
    $sql_str = "SELECT * FROM danhmuc ORDER BY iddm";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>

        
            <tr>
                <td><?=$row['iddm']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['status']?></td>
                <td>
                    <a class="btn btn-warning" href="editdanhmuc.php?iddm=<?=$row['iddm']?>">Edit</a>  
                    <a class="btn btn-danger" 
                    href="deletedanhmuc.php?iddm=<?=$row['iddm']?>"
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