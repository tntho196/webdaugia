<?php require_once __DIR__. "/layouts/header.php";  ?> 
<?php
        $id=$_GET['keywork'];
        if(isset($_GET['page']))
       {
           $p=$_GET['page'];
       }
       else
       {
           $p=1;
       }
        $sql="SELECT * FROM sanpham WHERE TenSP LIKE '%$id%'";

        $showsproduct=$db->fetchJone('sanpham',$sql,$p,2,false,'MaSP');
  ?>
                    <div class="col-md-9 col-xs-3 bor">
                        

                        <section class="box-main1">
                            <h3 class="title-main"><a href="">Tất Cả Sản Phẩm</a> </h3>
                            
                            <div class="showitem">
                                <?php foreach ($showsproduct as $key ): ?>
                                    
                                    <div class="col-md-4 item-product bor " >
                                    <a  href="chitiet.php?id=<?php echo $key['MaSP']  ?>">
                                        <img src="/daugia3.0/public/upload/product/<?php echo $key['Anh'] ?>" class="" width="100%" height="180px">
                                    </a>
                                    <div class="info-item">
                                        <a href=""><?php echo $key['TenSP']  ?></a>
                                        <p><strong class="price">Giá Khởi điểm: <?php echo number_format($key['GiaKhoiDiem'] ) ?> vnđ</strong> </p>
                                        <p>Ngày Kết thúc: <?php  echo  date("d-m-Y", strtotime($key['ThoiHan']));  ?></p>
                                    </div>
                                    <div class="hidenitem">
                                        
                                    </div>
                                </div>
                                <?php endforeach;   ?>

                            </div>
                        </section>

                    </div>
                </div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function() {
            $.ajax({
                method: 'GET',
                url: 'updateTrangThaiBanHang.php',
            })
        }, 3000);
    });
</script>
