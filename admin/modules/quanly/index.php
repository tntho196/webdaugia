
<?php
$open= "quanly" ;

    require_once __DIR__. "/../../layouts/header.php";  
    $user= $db->fetchAll("admin");
 ?>
                    <!-- Page Heading  Nội dung -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Trang quản trị ADmin
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="add.php">Thêm Admin</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Danh sách Admin
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                        </div>
                        
                    </div>


                    <!-- /.row -->
                    <div class="row">
                        <div class ="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" >
                                    
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MÃ Thành Viên</th>
                                            <th>Tên Đăng Nhập</th>
                                            <th>Mật Khẩu</th>
                                           
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=1; foreach ($user as $item ):  ?>
                                        <tr>
                                            <td><?php echo $stt  ?></td>
                                            <td><?php echo $item['username']  ?></td>
                                            <td><?php echo $item['Ten'] ?></td>
                                            <td><?php echo $item['MatKhau'] ?></td>
                                            
                                            <td>
                                                <a class="btn btn-xs btn-info " href="edit.php?id=<?php echo $item['username']  ?>" >Sửa</a>
                                                <a class="btn btn-xs btn-danger"  href="delete.php?id=<?php echo $item['username']  ?>">Xóa</a>
                                            </td>
                                        </tr>

                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>