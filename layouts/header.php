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
                                                xin chào <?php echo $_SESSION['name_user']  ?>   
                                            </li>
                                             <li>
                                                <a href=""><i class="fa fa-user"></i> My Account <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="">Thông Tin</a></li>
                                                    
                                                    <li><a href="thoat.php"> Thoát</a></li>
                                                </ul>
                                            </li>
                                            
                                        <?php else:  ?>
                                            <li>
                                                <a href="login.php"><i class="fa fa-unlock"></i> Login</a>
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
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            <option> Dell </option>
                                            <option> Hp </option>
                                            <option> Asuc </option>
                                            <option> Apper </option>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="/daugia3.0/public/frontend/images/logo-default.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
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
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="addproduct.php">Đăng tải Sản Phẩm</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href=""><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach ($showloai as $key ) : ?>

                                <li>

                                    <a href=""><?php echo $key['TenLoaiSP'] ?>  </a>
                                    
                                </li>
                            <?php endforeach;  ?>
                               
                            </ul>
                        </div>

                        
                    </div>

