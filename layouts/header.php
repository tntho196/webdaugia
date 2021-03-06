<?php require_once __DIR__. "/../autoload/autoload.php"; 
$showloai=$db->fetchAll('loaisp');

 ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Web bán đấu giá </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
      
         <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Include Editor style. -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
         
        <!-- Include JS file. -->
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.min.js'></script>

    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            
                            <div class="col-md-12">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        
                                        <?php  if(isset($_SESSION['name_user'])):  ?>
                                            <li>
                                                <div id="noti">
                                                    <div class="dropdown nav-item">
                                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="nc-icon nc-planet"></i>
                                                            <span class="notification" id="count-noti"></span>
                                                            <span class="d-lg-none"><span class="glyphicon glyphicon-bell" aria-hidden="true" id="noti-icon"></span></span>
                                                        </a>
                                                        <ul class="dropdown-menu" id="list-noti">
                                                            <!-- <a class="dropdown-item" href="#">Notification 1</a> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    $.ajax({
                                                        method: 'GET',
                                                        data: {
                                                            id: <?php echo $_SESSION['name_id']; ?>
                                                        },
                                                        url: 'thongbao.php',
                                                        dataType: 'json'
                                                    }).
                                                        done(function (res) {
                                                            $('#list-noti').html('');
                                                            $('#count-noti').html(res.length);
                                                            res.map(function (item) {
                                                                var html = '<a href="chitiet.php?id='+item.MaSP+'"><div class="noti-item" > Bạn đã chiến thắng sản phẩm <strong>'+item.TenSP+'<strong> - Chi tiết</div></a>';
                                                                $('#list-noti').append(html);  
                                                            })
                                                        })
                                                </script>
                                                <style>
                                                    #list-noti {
                                                        padding-top: 10px;
                                                        width: 250px
                                                    }
                                                    .noti-item {
                                                        border-top: 1px solid black;
                                                    }
                                                </style>
                                            </li>
                                            <li>
                                                Xin chào <?php echo $_SESSION['name_user']  ?>   
                                            </li>
                                            
                                             <li>
                                                <a href=""><i class="fa fa-user"></i> My Account <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="info_myuser.php">Thông Tin</a></li>
                                                    
                                                    <li><a href="thoat.php"> Thoát</a></li>
                                                    <li><a href="sua_info.php">Sửa thông tin</a></li>
                                                </ul>
                                            </li>

                                            
                                        <?php else:  ?>
                                            <li>
                                                <a href="login.php"><i class="fa fa-unlock"></i> Đăng Nhập</a>
                                            </li>
                                             <li>
                                                <a href="dangky.php"><i class="fa glyphicon glyphicon-plus"></i> Đăng ký</a>
                                            </li>
                                        <?php endif;  ?>
                                       
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" method= "GET" action="timkiem.php" >
                                <label>Tìm Kiếm Sản Phẩm: </label>
                                <div class="form-group">
                                   
                                    <input type="text" name="keywork" placeholder=" Nhập sản phẩm cần tìm..." class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                <img src="public/frontend/images/logo-default.png">
                            </a>
                        </div>
                        <div class="col-md-3 " id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0986420994</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                              <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                   <?php foreach ($showloai as $key ) : ?>

                                <li>

                                    <a href="phanloai.php?id=<?php echo $key['id']  ?>"><?php echo $key['TenLoaiSP'] ?>  </a>
                                    
                                </li>
                            <?php endforeach;  ?>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="">Liên hệ</a>
                            </li>
                            <li>
                                <a href="">Hướng Dẫn</a>
                            </li>
                            <li>
                                <a href="addproduct.php">Đăng tải Sản Phẩm</a>
                            </li>
                          
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            
                            <li>
                                <a href="info_myuser.php?id=<?php echo $_SESSION['name_id'] ?> "><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                

