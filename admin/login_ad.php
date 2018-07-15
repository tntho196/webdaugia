<?php 
   require_once __DIR__. "/autoload/autoload.php";
   if(isset($_SESSION['name_ad_id']))
    {
         echo " <script> alert('Bạn Đã Đăng Nhập ');location.href='index.php'</script>" ;
    }
   if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "username"=> postInput('username'),
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
           $is_checked=$db->fetchOne("admin","username= '".$data['username']."' AND MatKhau='".($data['MatKhau'])."' ");
           if($is_checked!=NULL)
           {
            // đăng nhặp thành công
              $_SESSION['name_ad_id']=$is_checked['username'];
              
              echo " <script> alert('Đăng nhập thành công ');location.href='/daugia3.0/admin'</script>" ;
              
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
    <title> Đăng nhập Bằng quyền quản trị </title>
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body background="https://images.unsplash.com/photo-1460602594182-8568137446ce?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c6a89cf0d31c8ed23b35aaf9a119a9f5&w=1000&q=80">
  

   
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    
    <div align="center" style=" color: #f1f1f1 ">
            
           <h1><strong> ĐẤU GIÁ MAXSHOP</strong> </h1></div>
   <form action="" method="POST" accept-charset="utf-8">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info" >
         <div class="panel-heading">
          
            <div class="panel-title">Đăng nhập dưới quyền quản trị</div>
            
         </div>
         <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" role="form">
              <?php require_once __DIR__. "../../partials/notification.php";   ?> 
               <div style="margin-bottom: 25px" class="input-group">
                
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Tên đăng nhập...  ">                                        
               </div>
               <?php
                                if(isset($error['username'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['username'] ?>  </p> 
                                

                              <?php endif  ?>
               <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu ...">
               </div>
               <?php
                                if(isset($error['password'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['password'] ?>  </p> 
                                

                              <?php endif  ?>
               
               <div style="margin-top:10px" class="form-group">
                  <!-- Button -->
                  <div class="col-sm-12 controls" style="text-align: center">
                     
                          
                           <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    
                    
                     
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