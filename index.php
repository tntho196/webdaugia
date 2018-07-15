<?php require_once __DIR__. "/layouts/header.php";  ?> 
<?php
         $sql="SELECT sanpham.*   FROM sanpham  WHERE  Trangthai =0 ";
       if(isset($_GET['page']))
       {
           $p=$_GET['page'];
       }
       else
       {
           $p=1;
       }

        $showsproduct=$db->fetchJone('sanpham',$sql,$p,10,true,'MaSp');
         if(isset($showsproduct['page']))
        {
        $sotrang=$showsproduct['page'];
        unset($showsproduct['page']);
       }
  ?>
                    <div class="col-md-9 col-xs-6 bor">
                        

                        <section class="box-main1">
                            <h3 class="title-main"><a href="">Tất Cả Sản Phẩm đang đấu giá</a> </h3>
                            
                            <div class="showitem">
                                <?php foreach ($showsproduct as $key ): ?>
                                    
                                    <div class="col-md-4  item-product bor " >
                                    <a  href="chitiet.php?id=<?php echo $key['MaSP']  ?>">
                                        <img src="/daugia3.0/public/upload/product/<?php echo $key['Anh'] ?>" class="" width="100%" height="180px">
                                    </a>
                                    <div class="info-item">
                                        <a href=""><strong><?php echo $key['TenSP']  ?></strong></a>
                                        <p><strong class="price">Giá Khởi điểm: <?php echo number_format($key['GiaKhoiDiem'] ) ?> vnđ</strong> </p>
                                        <p>Ngày Kết thúc: <?php  echo  date("d-m-Y", strtotime($key['ThoiHan']));  ?></p>
                                    </div>
                                    <div class="hidenitem">
                                        <!-- <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p> -->
                                    </div>
                                </div>
                                <?php endforeach;   ?>

                            </div>
                        </section>

                    </div>
                     <div class="container" align="center">
                        <div class="row">
                        <h2></h2>
                            <ul class="pagination "  >
                                <li><a href="<?php if($sotrang>1&&$p>1) echo '?page='.($p-1) ?>">&laquo;</a></li>
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
                                <li><a href="<?php if($sotrang>$p && $sotrang>1) echo '?page='.($p+1) ?>">&raquo;</a></li>
                            </ul>
                        </div>
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
        }, 300);
    });
</script>
                