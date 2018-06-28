
<?php
$open= "user" ;

    require_once __DIR__. "/../../layouts/header.php";  
    $user= $db->fetchAll("thanhvien");
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
                                    <i class="fa fa-dashboard"></i>  <a href="add.php">Thêm Thành viên</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Hiển thị danh sách Thành viên 
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <?php if(isset($_SESSION['success'])) :  ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']);  ?>
                                </div>
                            <?php endif;  ?>

                            <?php if(isset($_SESSION['error'])) :  ?>
                                <div class="alert alert-danger  ">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']);  ?>
                                </div>
                            <?php endif;  ?>
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
                                            <th>Họ</th>
                                            <th>Tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Giới Tính</th>
                                            <th>Địa Chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=1; foreach ($user as $item ):  ?>
                                        <tr>
                                            <td><?php echo $stt  ?></td>
                                            <td><?php echo $item['MaThanhVien']  ?></td>
                                            <td><?php echo $item['TenDangNhap'] ?></td>
                                            <td><?php echo $item['MatKhau'] ?></td>
                                            <td><?php echo $item['Ho'] ?></td>
                                            <td><?php echo $item['Ten'] ?></td>
                                            <td><?php echo $item['NgaySinh'] ?></td>
                                            <td><?php if($item['GioiTinh']==1) echo 'Nam'; else echo 'Nữ';  ?></td>
                                            <td><?php echo $item['Diachi'] ?></td>
                                            <td><?php echo $item['Email'] ?></td>
                                            <td><?php echo $item['SDT'] ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-info " href="edit.php?id=<?php echo $item['MaThanhVien']  ?>" >Sửa</a>
                                                <a class="btn btn-xs btn-danger"  href="delete.php?id=<?php echo $item['MaThanhVien']  ?>">Xóa</a>
                                            </td>
                                        </tr>

                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>