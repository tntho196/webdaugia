
  <?php
    $open= "quanly" ;
    require_once __DIR__. "/../../../autoload/autoload.php";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "username"=> postInput('username'),
            "Ten"   => postInput('lastname'),
            "MatKhau"   => postInput('password')
        ];
        $error ='';
        if(postInput('username')==''||postInput('lastname')==''||postInput('password')=='')
        {
            $error="bạn phải nhập đầy đủ thông tin";
        }

        if(empty($error))
        {
            $isset=$db->fetchOne('admin',"username ='".$data['username']."' ");
            if($isset>0)
            {
                $_SESSION['error']= "Tên đăng nhập đã tồn tại";
            }
            else
                {
                    $id_insert= $db->insert('admin',$data);
                if(isset($id_insert) )
                {
                    $_SESSION['success']= "Thêm mới thành công";
                    redirectAdmin('quanly');

                }
                else
                {
                    // thêm thất bại
                    $_SESSION['error']= "Thêm mới thất bại";
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
                            <i class="fa fa-dashboard"></i>  Thêm Admin
                        </li>
                    </ol>
                    <!-- thng tin lỗi -->
                    <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                    <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Thêm !
                    </legend>
                    <form action="" method="post" class="form" role="form">
                        
                            <input class="form-control" name="username" placeholder="Tên Đăng Nhập" type="text">
                            
                            <input class="form-control" name="lastname" placeholder="Tên" type="text"> 
                            <input class="form-control" name="password" placeholder="Mật khẩu" type="password">
                            
                            
                        
                        
                        
                        <br> 
                       
                            
                                <?php if(isset($error))
                                        echo " <div class='alert alert-danger'>
                                          $error
                                                        </div>";
                                        
                                 ?>   
                            
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Thêm</button>

                    </form>
                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>