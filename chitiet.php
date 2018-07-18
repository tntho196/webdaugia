<?php require_once __DIR__. "/layouts/header.php";  ?> 
<?php
        $id=getInput('id');
        $show_one_product=$db->fetchID('sanpham',$id,'MaSP');
        
        // hiện chi tiết đấu giá

        if(isset($_GET['page']))
        {
            $p=$_GET['page'];
        }
        else
        {
            $p=1;
        }
        $sql="SELECT ctdaugia.*,thanhvien.TenDangNhap as username, CONCAT(thanhvien.Ho,' ',thanhvien.ten) as hoten FROM ctdaugia,thanhvien  WHERE  ctdaugia.MaThanhVien = thanhvien.MaThanhVien and ctdaugia.MaSP='$id' ORDER BY GiaMuonDau DESC ";
        $ctdaugia= $db->fetchJone("ctdaugia",$sql,$p,2,false,'MaCT');
        if(isset($ctdaugia['page']))
        {
            $sotrang=$ctdaugia['page'];
            unset($ctdaugia['page']);
        }
        // hien nguoi chien thang
        if($show_one_product['Trangthai']==1)
        {
            $nguoithang=$db->fetchnguoi('ctdaugia',$id);
            $max =$nguoithang['MaThanhVien'];
            $data =['NguoichienThang'=>$max];

            $id_update= $db->update('sanpham',$data, array("MaSP"=>$id));
        }







        // hien thi 1 user
        $iduser=$show_one_product['NguoiBan'];
        $show_one_user=$db->fetchID('thanhvien',$iduser, 'MaThanhVien');

        $maxgia=$db->maxsql('ctdaugia','GiaMuonDau',$id,'MaSP');
        $maxgia=max($maxgia,$show_one_product['GiaKhoiDiem']);
        // them ct dau gia
          if($_SERVER["REQUEST_METHOD"]== "POST")
            {   
                if(!isset($_SESSION['name_user']))
                {
                     echo " <script> alert('Bạn phải đăng nhập để đấu giá ');location.href='login.php'</script>" ;
                }
                $data =
                [
                    "GiaMuonDau"=> postInput('daugia'),
                    "MaSP"=>$id,
                    "MaThanhVien"=>$_SESSION['name_id']
                    



                ];
                $error =[];
                if(postInput('daugia')==''|| (postInput('daugia')<($maxgia+10000)))
                {
                    $error['daugia']=" Bạn phải nhập giá lớn hơn giá cao nhất 10000 vnđ ";
                }
                if($_SESSION['name_id']==$iduser)
                {
                    $error['user_load']="Bạn không thể đấu giá sản phẩm này khi bạn là người bán ";
                }
                if($show_one_product['Trangthai']==1)
                {
                    $error['trangthai']= " Phiên đấu giá Đã kết thúc";
                }
                


                if(empty($error))
                {
                    

                    $id_insert= $db->insert('ctdaugia',$data);
                    
                        if(isset($id_insert) )
                        {
                            
                            $_SESSION['success']= "  thành công";
                            
                            

                        }
                        else
                        {
                            // thêm thất bại
                            $_SESSION['error']= "thất bại";
                        }
                      
                    
                }
                


            }

            

  ?>
<div class="col-md-8 col-md-offset-2 bor">
                        

                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="public/upload/product/<?php echo $show_one_product['Anh'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    
                                    <li><h3> <?php echo $show_one_product['TenSP']  ?></h3></li>
                                    <li><p> Người bán: <b class=""><a href="info_user.php?id=<?php echo $show_one_user['MaThanhVien'] ?>"><?php echo $show_one_user['TenDangNhap']  ?></a> 
                                    
                                    <li><p> Giá Khởi điểm: <b class="price"><?php echo number_format($show_one_product['GiaKhoiDiem'])  ?> vnđ</b></li>
                                    <li><p><h3> Giá Cao Nhất Hiện Tại:</h3> <b class="price" id="giaMaxHienTai"><?php echo number_format($maxgia)  ?> VNĐ</b></li>
                                    <li><p> <strong>Ngày Kết Thúc:  </strong>  <b class="date"><?php echo" " .$show_one_product['ThoiHan'] ?> </b></li>
                                    <li> <p><strong>Trạng Thái:</strong></p> <?php  if($show_one_product['Trangthai']==0) echo "Đang Đấu Giá "; else echo "Đã Kết Thúc";  ?></li>
                                    
                               </ul>
                            </div>

                        </section>
                        <div class="row bor " style="margin-top: 20px;padding: 30px;">
                            <form action="" method="POST" accept-charset="utf-8">
                                <br>
                                 <label >Giá muốn đấu:</label>
                                 <div class="input-group ">
                                        <input  name="daugia"type="number" step="10000" class="form-control"  value="<?php echo $maxgia ?>" id="inputGiaMax">
                                        <br>
                                        <div class="">

                                        <?php if(isset($error['trangthai'])): ?>
                                            
                                            
                                                <p class="text-danger"> <?php echo  $error['trangthai'] ?>  </p> 
                                        
                                          <?php endif;  ?>
                                        <?php if(isset($error['daugia'])): ?>
                                            
                                            
                                                <p class="text-danger"> <?php echo  $error['daugia'] ?>  </p> 
                                        
                                          <?php endif;  ?>
                                          <?php if(isset($error['user_load'])): ?>
                                            
                                                <br>
                                                <p class="text-danger"> <?php echo  $error['user_load'] ?>  </p> 
                                        
                                          <?php endif;  ?>

                                          
                                        </div>
                                        <br>
                                        <ul>
                                            <li></li>
                                            <li><button class="btn btn-lg btn-primary " style=" margin-top: 10px;
                                                        " type="submit"> Đấu Giá Ngay</button></li>
                                        </ul>
                                 </div>
                                 <br>
                                
                            </form>
                        </div>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home"><strong>Mô tả sản phẩm </strong></a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Nội dung</h3>
                                        <br>
                                        <p>
                                        <?php echo nl2br( $show_one_product['ThongTinSP']);  ?>
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home"><strong>Chi tiết đấu giá </strong></a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Họ Tên</th>
                                                    <th>username</th>
                                                    <th>Giá</th>
                                                    <th>thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableChiTietDauGiaBody">
                                                <?php $stt=1; foreach ($ctdaugia as $key):?> 
                                                
                                                
                                                <tr>

                                                    <td><?php echo $stt ?></td>
                                                    <td><?php echo $key['hoten']  ?></td>
                                                    <td><a href="info_user.php?id=<?php echo $key['MaThanhVien'] ?>"><?php echo $key['username']  ?></a></td>
                                                    <td><?php echo number_format($key['GiaMuonDau'])  ?> vnđ</td>
                                                    <td><?php echo $key['thoigian'] ?></td>
                                                               <?php $stt++ ;?>
                                                </tr>
                                                <?php endforeach;  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <script>
                        (function ($) {
                              $('.spinner .btn:first-of-type').on('click', function() {
                                $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 100000);
                              });
                              $('.spinner .btn:last-of-type').on('click', function() {
                                $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 100000);
                              });
                            })(jQuery);
                        $(document).ready(function () {
                            setInterval(function(){ 
                                $.ajax({
                                method: 'GET',
                                data: {
                                    id: <?php echo $id; ?>
                                },
                                url: 'lay_ctdaugia.php',
                                dataType: 'json'
                            }).
                                done(function (res) {
                                    $('#giaMaxHienTai').html(parseFloat(res.maxgia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + ' VNĐ')
                                    var ctBody = '';
                                    res.ctdaugia.map(function(item, key) {
                                        var row = '<tr>'+
                                        '<td>'+parseInt(key+1)+'</td>'+
                                        '<td>'+item.hoten+'</td>'+
                                        '<td><a href="info_user.php?id='+item.MaThanhVien+'">'+item.username+'</a></td>'+
                                        '<td>'+parseFloat(item.GiaMuonDau).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + ' VNĐ'+'</td>'+
                                        '<td>'+item.thoigian+'</td>'+
                                    '</tr>'
                                        ctBody = ctBody + row;
                                    })
                                    $('#tableChiTietDauGiaBody').html(ctBody)
                                })
                             }, 3000);
                            
                        })
                    </script>
<?php require_once __DIR__. "/layouts/footer.php";  ?>
