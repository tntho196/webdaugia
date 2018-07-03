    
<?php
$open= "product" ;

    require_once __DIR__. "/../../layouts/header.php";  
    
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }
    $sql="SELECT sanpham.* , loaisp.TenLoaiSP as namecate FROM sanpham ,loaisp WHERE  loaisp.id = sanpham.MaLoai";
    $product= $db->fetchJone("sanpham",$sql,$p,2,true,'MaLoai');
    if(isset($product['page']))
    {
        $sotrang=$product['page'];
        unset($product['page']);
    }
 ?>
                    <!-- Page Heading  Nội dung -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Trang quản trị ADmin
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="add.php">Thêm Sản phẩm</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Danh sách Admin
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                        </div>
                        
                    </div>


                    <!-- /.row -->
                    <div class="row">
                        <div class ="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" >
                                    
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MÃ sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá khởi điểm</th>
                                           
                                            <th>Người bán</th>
                                            <th>Thông tin SP</th>
                                            <th>Trạng Thái</th>
                                            <th>Mã Loại</th>
                                            <th>Ảnh</th>
                                            <th>Tùy Chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=1; foreach ($product as $item ):  ?>
                                        <tr>
                                            <td><?php echo $stt  ?></td>
                                            <td><?php echo $item['MaSP']  ?></td>
                                            <td><?php echo $item['TenSP'] ?></td>
                                            <td><?php echo $item['GiaKhoiDiem'] ?></td>
                                            <td><?php echo $item['NguoiBan'] ?></td>
                                            
                                            <td><?php echo $item['ThongTinSP'] ?></td>
                                            <td><?php echo $item['Trangthai'] ?></td>
                                            <td><?php echo $item['namecate'] ?></td>
                                            <?php $anh= $item['Anh'];  ?>
                                            <td>
                                                
                                                <a href="<?php echo '/daugia3.0/public/upload/product/'.$anh ?>">
                                                    <img src="<?php echo '/daugia3.0/public/upload/product/'.$anh ?>" width="80px" height="80px" >
                                                </a>
                                            </td>
                                            
                                            
                                            <td>
                                                <a class="btn btn-xs btn-info " href="edit.php?id=<?php echo $item['MaSP']  ?>" >Sửa</a>
                                                <a class="btn btn-xs btn-danger"  href="delete.php?id=<?php echo $item['MaSP']  ?>">Xóa</a>
                                            </td>
                                        </tr>

                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>
                            </div> 

                        </div>
                    </div>
                    <div class="example">
                    <div class="container ">
                        <div class="row">
                        <h2></h2>
                            <ul class="pagination "  >
                                <li><a href="#">&laquo;</a></li>
                                <?php for($i=1;$i<=$sotrang;$i++) :  ?>
                                    <?php
                                        if(isset($_GET['page']))
                                        {
                                            $p=$_GET['page'];
                                        } 
                                        else
                                        {
                                            $p=1;
                                        }
                                     ?>
                                     <li class="<?php echo ($i==$p) ? 'active' : ''  ?>">
                                         <a href="?page=<?php echo $i;  ?>"> <?php echo $i;  ?> </a>
                                     </li>
                                 <?php endfor;  ?>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>