<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Đăng nhập trnag web đấu giá</title>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
   
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    
    
   <?php
    require_once __DIR__. "/autoload/autoload.php";
   if(isset($_SESSION['name_id']))
    {
         echo " <script> alert(Phải đăng nhập để sửa thông tin ');location.href='login.php'</script>" ;
    }
    

    if(isset($_SESSION['name_id']))
    {
         echo " <script> alert(Phải đăng nhập để sửa thông tin ');location.href='login.php'</script>" ;
    }

    $id=$_SESSION['name_id'];
    $EditUser= $db->fetchID('thanhvien',$id, 'MaThanhVien');

    if(empty($EditUser))
    {
        $_SESSION['error']= "Dứ liệu không tồn tại";
        
    }
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            
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
        if(postInput('password')==''||postInput('firstname')==''||postInput('lastname')==''||postInput('ngaysinh')==''||postInput('sex')==''||postInput('diachi')==''||postInput('youremail')==''||postInput('SDT')=='')
        {
            $error="bạn phải nhập đầy đủ thông tin";
        }

        if(empty($error))
        {   

           
                        $id_update= $db->update('thanhvien',$data, array("MaThanhVien"=>$id));
                        
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                             echo "<script> alert(Cập Nhật Thành Công ');location.href='info_user.php'</script>" ; 

                        }
                        else
                        {
                            // thêm thất bại
                            $_SESSION['error']= "Cập Nhật thất bại";
                        }
                    
            
        }
    }
  ?>



<!-- Page Heading  Nội dung -->
            
                            <?php require_once __DIR__. "/partials/notification.php";   ?>
           
            <div class="col-md-9  col-xs-9">
                <div class="col-xs-12 col-sm-12 col-md-8 well well-sm col-md-offset-2">
                    <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Sửa thông tin thành viên!
                    </legend>
                    <form action="" method="post" class="form" role="form">
                        <div class="row">
                            <div class="col-xs-6 col-md-6"> <input class="form-control" name="firstname" placeholder="Họ" required="" autofocus="" type="text" value="<?php echo $EditUser['Ho']  ?>""> 
                            </div>
                            <div class="col-xs-6 col-md-6"> <input class="form-control" name="lastname" placeholder="Tên" required="" type="text" value="<?php echo $EditUser['Ten']  ?>""> 
                            </div>
                        </div>
                        <input class="form-control" name="username" placeholder="Tên Đăng Nhập" readonly="1" type="text" value="<?php echo $EditUser['TenDangNhap']  ?>">
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
</body>
</html>