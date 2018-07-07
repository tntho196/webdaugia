    <?php require_once __DIR__. "/layouts/header.php";  ?> 
    <?php
       $id=$_SESSION['name_id'];
       $show_one_user=$db->fetchID('thanhvien',$id,'MaThanhVien');
       $sql="SELECT sanpham.*   FROM sanpham  WHERE  NguoiBan =$id ";
       if(isset($_GET['page']))
       {
           $p=$_GET['page'];
       }
       else
       {
           $p=1;
       }
       
       $show_product_us= $db->fetchJone("sanpham",$sql,$p,2,false,'MaSp');
       $sql_history="SELECT ctdaugia.*,sanpham.*   FROM sanpham,ctdaugia  WHERE  MaThanhVien =$id AND ctdaugia.MaSP =sanpham.MaSP ";
       $show_history= $db->fetchJone("ctdaugia",$sql_history,$p,2,false,'MaCT');
       
       
       
       ?>
    <div class="col-md-9 bor">
       <section class="box-main1">
          <h3 class="title-main"><a href="">Thông Tin Cá Nhân </a> </h3>
          <div class="col-md-6">
             <div><label>Tên Đăng Nhập: </label> <?php echo $show_one_user['TenDangNhap']   ?> </div>
             <div><label>Họ Tên </label> <?php echo $show_one_user['Ho']; echo " ". $show_one_user['Ten']   ?>  </div>
             <div><label>Ngày Sinh </label> <?php echo $show_one_user['NgaySinh']   ?> </div>
             <div><label>Giới Tính: </label> <?php  if($show_one_user['GioiTinh']==0) echo 'Nữ'; else echo 'Nam';   ?> </div>
             <div><label>Địa Chỉ: </label> <?php echo $show_one_user['Diachi']   ?> </div>
             <div><label>Email: </label> <?php echo $show_one_user['Email']   ?> </div>
             <div><label>Số Điện Thoại : </label> <?php echo $show_one_user['SDT']   ?> </div>
          </div>
       </section>
    </div>
    <div class="col-md-12" id="tabdetail">
       <div class="row">
          <ul class="nav nav-tabs">
             <li class="active"><a data-toggle="tab" href="#home"><strong>Các sản Phẩm Của bạn </strong></a></li>
             <li><a data-toggle="tab" href="#ls"><strong>Lịch sử Đấu Giá </strong></a></li>
             
          </ul>
          <div class="tab-content">
             <div id="home" class="tab-pane fade in active ">
                <br>
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
                               <p>Tên Sản Phẩm</p>
                            </strong>
                         </th>
                                                     
                         <th>
                            <strong>
                               <p>Giá Bán</p>
                            </strong>
                         </th>
                                                     
                         <th>
                            <strong>
                               <p>thời gian</p>
                            </strong>
                         </th>
                         <th> Tùy Chọn </th>
                                                 
                      </tr>
                                          
                   </thead>
                                       
                   <tbody>
                      <?php $stt=1; foreach ($show_product_us as $key):?> 
                                              
                      <tr>
                                                     
                         <td><?php echo $stt ?></td>
                                                     
                         <td><?php echo $key['TenSP']  ?></td>
                                                     
                                                     
                         <td><?php echo number_format($key['GiaKhoiDiem'])  ?> vnđ</td>
                                                     
                         <td><?php echo $key['ThoiHan'] ?></td>
                         <td>
                                                <a class="btn btn-xs btn-info " href="editSP.php?id=<?php echo $key['MaSP']  ?>" >Sửa</a>
                                                <a class="btn btn-xs btn-danger"  href="deleteSP.php?id=<?php echo $key['MaSP']  ?>">Xóa</a>
                                            </td>
                         <?php $stt++ ;?>
                                                 
                      </tr>
                                              <?php endforeach;  ?>
                                          
                   </tbody>
                                   
                </table>
             </div>
             <div id="ls" class="tab-pane fade ">
                <br>
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
                               <p>Tên Sản Phẩm</p>
                            </strong>
                         </th>
                                                     
                         <th>
                            <strong>
                               <p>Giá Bạn Đấu</p>
                            </strong>
                         </th>
                                                     
                         <th>
                            <strong>
                               <p>thời gian</p>
                            </strong>
                         </th>
                         <th>
                             xem chi tiết
                         </th>
                                                 
                      </tr>
                                          
                   </thead>
                                       
                   <tbody>
                    <?php $stt=1; foreach ($show_history as $key):?> 
                                              
                      <tr>
                                                     
                         <td><?php echo $stt ?></td>
                                                     
                         <td><?php echo $key['TenSP']  ?></td>
                                                     
                                                     
                         <td><?php echo number_format($key['GiaMuonDau'])  ?> vnđ</td>
                                                     
                         <td><?php echo $key['ThoiHan'] ?></td>
                         <?php $stt++ ;?>
                         <td>
                         <a class="btn btn-xs btn-info " href="chitiet.php?id=<?php echo $key['MaSP']  ?>" >xem chi tiết</a>
                         
                         </td>
                                                 
                      </tr>
                    <?php endforeach;  ?>
                                          
                   </tbody>
                                   
                </table>
             </div>
          </div>
          
       </div>
    </div>
    
</div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>