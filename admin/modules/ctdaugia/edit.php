<?php
    $open= "ctdaugia" ;
    require_once __DIR__. "/../../autoload/autoload.php";

    $id=intval(getInput('id'));
    $id_sanpham=$db->fetchAll('sanpham');
    $id_user=$db->fetchAll('thanhvien');
    $id_Ctiet=$db->fetchID('ctdaugia',$id,'MaCT');

    if(empty($id_Ctiet))
    {
        $_SESSION['error']= "Dứ liệu không tồn tại";
        redirectAdmin('ctdaugia');
    }
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "MaSP"=> postInput('MaSP'),
            "MaThanhVien"   => postInput('MaThanhVien'),
            "GiaMuonDau"    => postInput('GiaMuonDau'),
            "thoigian"   => postInput('ThoiGian'),
            
        ];
        $error ='';
        if(postInput('MaSP')==''||postInput('MaThanhVien')==''||postInput('GiaMuonDau')==''||postInput('ThoiGian')=='')
        {
            $error="bạn phải nhập đầy đủ thông tin";
        }

        if(empty($error))
        {
            
                    {
                        $id_update= $db->update('ctdaugia',$data, array("MaCT"=>$id));
                        if($id_update > 0)
                        {
                            $_SESSION['success']= "Cập nhật thành công";
                            redirectAdmin('ctdaugia');

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
                            <i class="fa fa-dashboard"> Sửa thông tin Chi tiết đấu giá</i>  
                        </li>
                    </ol>
                    <!-- thông tin lỗi -->
                    <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                    <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Sửa thông tin Chi tiết đấu giá!
                    </legend>
                    <form action="" method="post" class="form" role="form">
                        <div class="row">
                        	<div class="col-md-8">
                            <label  class="control-lable" > Sản Phẩm </label>
                           
                            <select class="form-control " name="MaSP" >
                            

                                <?php foreach( $id_sanpham as  $item):  ?>
                                    <option value="<?php echo $item['MaSP']  ?>" <?php if($item['MaSP']==$id_Ctiet['MaSP']) echo "selected= 'selected'" ?> > <?php echo $item['TenSP']  ?> 
                                    </option>   
                                <?php endforeach  ?> 
                            </select>
                            <br>
                            <label  class="control-lable" > Người Đấu giá </label>
                           
                            <select class="form-control " name="MaThanhVien" >
                            

                                <?php foreach( $id_user as  $item):  ?>
                                    <option value="<?php echo $item['MaThanhVien']  ?>" <?php if($item['MaThanhVien']==$id_Ctiet['MaThanhVien']) echo "selected= 'selected'" 	 ?> > <?php echo $item['TenDangNhap']  ?> 
                                    </option>    
                                <?php endforeach  ?> 
                            </select>
                        </div>
                        </div>

                      	<label> Giá Muốn Đấu </label> 
                        <input class="form-control" type="number" name="GiaMuonDau" step="10000"  value="<?php echo $id_Ctiet['GiaMuonDau']  ?>">
                        <br>
                        
                        
                        
                        <label > Thời Gian </label> 
                        <input class="form-control" type="dateTime" readonly="1" name="ThoiGian"  value="<?php echo $id_Ctiet['thoigian']  ?>">
                        <br>
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Sửa</button>

                    </form>

                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>