<?php
    $open= "user" ;
    require_once __DIR__. "/../../autoload/autoload.php";

    $id=intval(getInput('id'));
    $EditUser= $db->fetchID('thanhvien',$id, 'MaThanhVien');

    if(empty($EditUser))
    {
        $_SESSION['error']= "Dữ liệu không tồn tại";
        redirectAdmin('user');
    }
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "TenDangNhap"=> postInput('username'),
            "MatKhau"   => postInput('password'),
            "Ho"    => postInput('firstname'),
            "Ten"   => postInput('lastname'),
            "NgaySinh"  => postInput('ngaysinh'),
            "GioiTinh"  => postInput('sex'),
            "Diachi"    => postInput('diachi'),
            "Email" => postInput('youremail'),
            "SDT"   => postInput('SDT')
        ];
        $error ='';
        if(postInput('username')==''||postInput('password')==''||postInput('firstname')==''||postInput('lastname')==''||postInput('ngaysinh')==''||postInput('sex')==''||postInput('diachi')==''||postInput('youremail')==''||postInput('SDT')=='')
        {
            $error="bạn phải nhập đầy đủ thông tin";
        }

        if(empty($error))
        {
            if($EditUser['TenDangNhap']!= $data['TenDangNhap'])
            {   
                $isset=$db->fetchOne('thanhvien',"TenDangNhap ='".$data['TenDangNhap']."' ");
                if($isset>0)
                {
                    $_SESSION['error']= "Tên đăng nhập đã tồn tại";
                }
                else
                    {
                        $id_update= $db->update('thanhvien',$data, array("MaThanhVien"=>$id));
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                            redirectAdmin('user');

                        }
                        else
                        {
                            // thêm thất bại
                            $_SESSION['error']= "Cập Nhật thất bại";
                        }
                    }
                
            }
            else
            {
                $id_update= $db->update('thanhvien',$data, array("MaThanhVien"=>$id));
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                            redirectAdmin('user');

                        }
                        else
                        {
                            // thêm thất bại
                            $_SESSION['error']= "Cập Nhật thất bại";
                        }

            }
            
        }
    }
  ?>


<?php require_once __DIR__. "/../../layouts/header.php";  ?>
<!-- Page Heading  Nội dung -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Trang quản trị ADmin
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"> Sửa thông tin thành viên</i>  
                        </li>
                    </ol>
                    <!-- thông tin lỗi -->
                    <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                    <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Sửa thông tin thành viên!
                    </legend>
                    <form action="" method="post" class="form" role="form">
                        <div class="row">
                            <div class="col-xs-6 col-md-6"> <input class="form-control" name="firstname" placeholder="Họ" required="" autofocus="" type="text" value="<?php echo $EditUser['Ho']  ?>""> 
                            </div>
                            <div class="col-xs-6 col-md-6"> <input class="form-control" name="lastname" placeholder="Tên" required="" type="text" value="<?php echo $EditUser['Ten']  ?>""> 
                            </div>
                        </div>
                        <input class="form-control" name="username" placeholder="Tên Đăng Nhập" type="text" value="<?php echo $EditUser['TenDangNhap']  ?>">
                        <input class="form-control" name="password" placeholder="Mật khẩu" type="password"  value="<?php echo $EditUser['MatKhau']  ?>"> 
                        <input class="form-control" name="youremail" placeholder="Email" type="email"  value="<?php echo $EditUser['Email']  ?>">
                        <label > Ngày sinh</label> 
                        <input class="form-control" type="date" name="ngaysinh"  value="<?php echo $EditUser['NgaySinh']  ?>">
                        <br>
                        <label class="radio-inline">          <input name="sex" id="inlineCheckbox1" value="1" type="radio" <?php if($EditUser['GioiTinh']==1) echo 'checked'  ?>>          Nam </label> <label class="radio-inline">          <input name="sex" id="inlineCheckbox2" value="0" type="radio" <?php if($EditUser['GioiTinh']==0) echo 'checked'  ?>>          Nữ </label> 
                        <br> 
                        <input class="form-control" name="diachi" placeholder="Địa Chỉ " type="text" value="<?php echo $EditUser['Diachi']  ?>">
                        <input class="form-control" name="SDT" placeholder="Số Điện Thoại " type="text" value="<?php echo $EditUser['SDT']  ?>" >
                        <br> 
                        <p>
                          <?php if(isset($error))
                                echo $error;
                           ?>  
                        </p>
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Sửa</button>

                    </form>
                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>