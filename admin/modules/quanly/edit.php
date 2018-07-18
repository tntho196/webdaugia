<?php
    $open= "quanly" ;
    require_once __DIR__. "/../../../autoload/autoload.php";

    $id=getInput('id');
    $EditUser= $db->fetchID('admin',$id, 'username');

    if(empty($EditUser))
    {
        $_SESSION['error']= "Dữ liệu không tồn tại";
        redirectAdmin('quanly');
    }
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
            if($EditUser['username']!= $data['username'])
            {   
                $isset=$db->fetchOne('admin',"username ='".$data['username']."' ");
                if($isset>0)
                {
                    $_SESSION['error']= "Tên đăng nhập đã tồn tại";
                }
                else
                    {
                        $id_update= $db->update('admin',$data, array("username"=>$id));
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                            redirectAdmin('quanly');

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
                $id_update= $db->update('admin',$data, array("username"=>$id));
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                            redirectAdmin('quanly');

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
                            <i class="fa fa-dashboard"></i>  sửa thông tin Admin
                        </li>
                    </ol>
                    <!-- thng tin lỗi -->
                    <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                    <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Sửa admin
                    </legend>
                    <form action="" method="post" class="form" role="form">
                        
                            <input class="form-control" name="username" placeholder="Tên Đăng Nhập" value="<?php echo $EditUser['username']  ?>" type="text">
                            
                            <input class="form-control" name="lastname" placeholder="Tên" value="<?php echo $EditUser['Ten']  ?>" type="text"> 
                            <input class="form-control" name="password" placeholder="Mật khẩu" type="password">
                            
                            
                        
                        
                        
                        <br> 
                       
                            
                                <?php if(isset($error))
                                        echo " <div class='alert alert-danger'>
                                          $error
                                                        </div>";
                                        
                                 ?>   
                            
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Cập nhập</button>

                    </form>
                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>