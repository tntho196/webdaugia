<?php  require_once __DIR__. "/../../autoload/autoload.php";  
    if(!isset($_SESSION['name_ad_id']))
    {
         echo " <script> alert('Bạn chưa Đăng Nhập ');location.href='../../login_ad.php'</script>" ;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin - Bootstrap Admin Template</title>
        <!-- Bootstrap Core CSS -->
        <link href= "<?php echo base_url()?>public/admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url()?>public/admin/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url()?>public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
         <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Include Editor style. -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
         
        <!-- Include JS file. -->
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.min.js'></script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Admin</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav ">
                    <li style="color:white;" >
                        
                    Xin Chào <?php echo $_SESSION['name_ad_id'] ?></li>
                    <a class="btn" href="../../logout_ad.php">Thoát</a>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class= "<?php echo isset($open) && $open == 'quanly' ? 'active': ''  ?>">
                            <a href="<?php echo modules("quanly ") ?>"><i class="fa fa-fw fa-dashboard"></i>Danh Sách Admin</a>
                        </li>
                        
                        <li class= "<?php echo isset($open) && $open == 'product' ? 'active': ''  ?>">
                            <a href="<?php echo modules("product") ?>"><i class="fa fa-fw fa-table"></i> Danh sách sản phẩm </a>
                        </li>
                        <li class= "<?php echo isset($open) && $open == 'user' ? 'active': ''  ?>" >
                            <a href=" <?php echo modules("user") ?> "><i class="fa fa-fw fa-edit"></i> Danh sách thành viên</a>
                        </li>
                        
                        <li class= "<?php echo isset($open) && $open == 'ctdaugia' ? 'active': ''  ?>">
                            <a href="../ctdaugia/index.php"><i class="fa fa-fw fa-wrench <?php echo isset($open) && $open == 'ctdaugia' ? 'active': ''  ?>"></i> Chi tiết đấu giá </a>
                        </li>
                        

                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">