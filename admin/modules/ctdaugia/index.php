    
<?php
$open= "ctdaugia" ;

    require_once __DIR__. "/../../layouts/header.php";  
    
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }
    $sql="SELECT * FROM (SELECT sanpham.*, thanhvien.TenDangNhap AS TenNguoiban FROM thanhvien,sanpham WHERE thanhvien.MaThanhVien=sanpham.NguoiBan ) AS bangNguoiban , (SELECT ctdaugia.* ,thanhvien.TenDangNhap AS TenNguoiDauGia FROM ctdaugia, thanhvien WHERE ctdaugia.MaThanhVien=thanhvien.MaThanhVien ) AS bangnguoimua WHERE bangNguoiBan.MaSP =bangnguoimua.MaSP";
    $product= $db->fetchJone("ctdaugia",$sql,$p,20,true,'MaCT');
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
                                <table class="table">
                                       
                                   <thead>
                                                              
                                      <tr>
                                                                     
                                         <th>
                                            <strong>
                                               <p>STT</p>
                                            </strong>
                                         </th>
                                         <th>
                                            <strong>
                                               <p>Mã CT đấu giá</p>
                                            </strong>
                                         </th>
                                                                     
                                         <th>
                                            <strong>
                                               <p>Tên Sản Phẩm</p>
                                            </strong>
                                         </th>
                                                                     
                                         <th>
                                            <strong>
                                               <p>Người bán</p>
                                            </strong>
                                         </th>
                                                                     
                                         <th>
                                            <strong>
                                               <p>Giá Khởi Điểm</p>
                                            </strong>
                                         </th>
                                         <th>
                                            <strong>
                                               <p>Thời Hạn</p>
                                            </strong>
                                         </th>
                                         <th>
                                            <strong>
                                               <p>Người Đấu Giá</p>
                                            </strong>
                                         </th>
                                         <th>
                                            <strong>
                                               <p>Giá Muốn Đấu</p>
                                            </strong>
                                         </th>
                                         
                                         <th>
                                            <strong>
                                               <p>Thời Gian</p>
                                            </strong>
                                         </th>
                                         <th>
                                             <strong>
                                               <p>Tùy Chọn</p>
                                            </strong>
                                         </th>
                                                                 
                                      </tr>
                                                          
                                   </thead>
                                       
                                   <tbody>
                                        <?php $stt=1; foreach ($product as $key):?> 
                                                                  
                                          <tr>
                                                                         
                                             <td><?php echo $stt ?></td>
                                             <td><?php echo $key['MaCT']  ?></td>                           
                                             <td><?php echo $key['TenSP']  ?></td>
                                             <td><?php echo $key['TenNguoiban']  ?></td>  
                                             <td><?php echo  number_format($key['GiaKhoiDiem'])  ?></td>
                                             <td><?php echo $key['ThoiHan'] ?></td>
                                             <td><?php echo $key['TenNguoiDauGia']  ?></td>                          
                                                                         
                                             <td><?php echo number_format($key['GiaMuonDau'])  ?> vnđ</td>
                                             <td><?php echo $key['thoigian']  ?></td>
                                                                         
                                             
                                             <?php $stt++ ;?>
                                             <td>
                                             <a class="btn btn-xs btn-danger " href="delete.php?id=<?php echo $key['MaCT']  ?>" >Xóa</a>
                                             <a class="btn btn-xs btn-info " href="edit.php?id=<?php echo $key['MaCT']  ?>" >Sửa</a>
                                             
                                             
                                             </td>
                                                                     
                                          </tr>
                                        <?php endforeach;  ?>
                                                          
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