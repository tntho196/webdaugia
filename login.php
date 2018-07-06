<?php 
   require_once __DIR__. "/autoload/autoload.php";

   if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "TenDangNhap"=> postInput('username'),
            "MatKhau"   => postInput('password')
            
        ];
        $error =[];
        if(postInput('username')=='')
        {
            $error['username']="bạn phải nhập username đăng nhập";
        }
        if(postInput('password')=='')
        {
            $error['password']="bạn phải nhập mật khẩu";
        }

        if(empty($error))
        {
           $is_checked=$db->fetchOne("thanhvien","TenDangNhap= '".$data['TenDangNhap']."' AND MatKhau='".($data['MatKhau'])."' ");
           if($is_checked!=NULL)
           {
            // đăng nhặp thành công
              $_SESSION['name_user']=$is_checked['TenDangNhap'];
              $_SESSION['name_id']=$is_checked['MaThanhVien']; 
              echo " <script> alert('Đăng nhập thành công ');location.href='index.php'</script>" ;
              
           }
           else
           {
            // dang nhap that bai
            $_SESSION['error']="Đăng nhập thất bại xem lại mật khẩu và tên đăng nhập";
            
           }
               
            
        }
    }
 ?>
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
    
    
   <form action="" method="POST" accept-charset="utf-8">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info" >
         <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            
         </div>
         <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" role="form">
               <div style="margin-bottom: 25px" class="input-group">
                <?php require_once __DIR__. "/partials/notification.php";   ?> 
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username  ">                                        
               </div>
               <?php
                                if(isset($error['username'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['username'] ?>  </p> 
                                

                              <?php endif  ?>
               <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
               </div>
               <?php
                                if(isset($error['password'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['password'] ?>  </p> 
                                

                              <?php endif  ?>
               
               <div style="margin-top:10px" class="form-group">
                  <!-- Button -->
                  <div class="col-sm-12 controls">
                     
                          
                           <button type="submit"> lg</button>
                    
                    
                     
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-12 control">
                     <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        Don't have an account! 
                        <a href="/daugia3.0/dangky.php">
                        Sign Up Here
                        </a>
                       
                                
                               
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   </form>
  
</div>
</body>
</html>