
  <?php
    $open= "product" ;
    require_once __DIR__. "/../../autoload/autoload.php";
    $id_loaisp=$db->fetchAll("loaisp");
    $id_user=$db->fetchAll("ThanhVien");
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "TenSP"=> postInput('TenSP'),
            "GiaKhoiDiem"   => postInput('price'),
            "NguoiBan"   => postInput('NguoiBan'),
            "ThongTinSP"   => postInput('content'),
            // "Anh"   => postInput('thunbar'),
            "MaLoai"   => postInput('loaisp'),
            "ThoiHan"   => postInput('ThoiHan')



        ];
        $error =[];
        if(postInput('TenSP')=='')
        {
            $error['TenSP']="Bạn phải nhập thông tin tên sản phẩm ";
        }
        if(postInput('price')==''||intval(postInput('price'))<0)
        {
            $error['price']="Bạn phải nhập giá và phải lớn hơn 0";
        }
        if(postInput('content')=='')
        {
            $error['content']="Bạn phải nhập thông tin sản phẩm";
        }
        if(! isset($_FILES['thunbar']))
        {
            $error['thunbar']="Mời bạn chọn ảnh";
        }


        if(empty($error))
        {
            if(isset($_FILES['thunbar']))
            {
                $file_name =$_FILES['thunbar']['name'];
                $file_tmp  =$_FILES['thunbar']['tmp_name'];
                $file_type =$_FILE['thunbar']['type'];
                $file_erro  =$_FILES['thunbar']['error'];

                if($file_erro == 0)
                {
                    $part= ROOT.'/product/';
                    $data['Anh']=$file_name;
                }

            }

            $id_insert= $db->insert('sanpham',$data);
            
                if(isset($id_insert) )
                {
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success']= "Thêm mới thành công";
                    redirectAdmin('product');

                }
                else
                {
                    // thêm thất bại
                    $_SESSION['error']= "Thêm mới thất bại";
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
                            <i class="fa fa-dashboard"></i>  Thêm Sản phẩm
                        </li>
                    </ol>
                    <!-- thng tin lỗi -->
                    <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php";   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                    <legend><i class="glyphicon glyphicon-globe"></i></a> Thêm !
                    </legend>
                    <form action="" method="post" class="form" role="form" enctype="multipart/form-data">
                        
                            <input class="form-control" name="TenSP" placeholder="Tên Sản Phẩm" type="text">
                            <?php
                                if(isset($error['TenSP'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['TenSP'] ?>  </p> 
                                

                              <?php endif  ?>
                            <br>
                            <label  class="control-lable" > Loại sản phẩm </label>
                           
                            <select class="form-control " name="loaisp" >
                            

                                <?php foreach( $id_loaisp as  $item):  ?>
                                    <option value="<?php echo $item['id']  ?>"> <?php echo $item['TenLoaiSP']  ?> 
                                    </option>   
                                <?php endforeach  ?> 
                            </select>
                            <br>
                            <label  class="control-lable" > Người bán </label>
                           
                            <select class="form-control " name="NguoiBan" >
                            

                                <?php foreach( $id_user as  $item):  ?>
                                    <option value="<?php echo $item['MaThanhVien']  ?>"> <?php echo $item['TenDangNhap']  ?> 
                                    </option>   
                                <?php endforeach  ?> 
                            </select>
                            
                            <label  class="control-lable" > Giá </label>
                            <input class="form-control" name="price" placeholder="Giá Khởi Điểm" type="text"> 
                            <?php
                                if(isset($error['price'])): ?>
                                
                                    <p class="text-danger"> <?php echo  $error['price'] ?>  </p> 
                            
                              <?php endif  ?>
                            
                   
                            <br>
                            <label>Thông tin sản phẩm</label>
                            <textarea class="form-control" name="content">
                                
                            </textarea>
                            <?php
                                if(isset($error['content'])): ?>
                                
                                    <p class="text-danger"> <?php echo  $error['content'] ?>  </p> 
                            
                              <?php endif  ?>

                            <br>
                            <label class="radio-inline">          <input name="trangthai" id="inlineCheckbox1" value="1" type="radio">          Đã Bán </label>
                            <label class="radio-inline">          <input name="trangthai" id="inlineCheckbox2" value="0" checked type="radio">          Chưa </label>
                            <br>
                            <br>
                            <label class="control-lable">Thời hạn </label>
                            <br>
                            <input class="form-control" name="ThoiHan" placeholder="Thời Hạn " type="date">
                            <label for="inputAnh " class="control-lable">Hình Ảnh</label>
                            <input type="file" class="form-control" id="inputAnh" name="thunbar">
                             <?php
                                if(isset($error['thunbar'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['S']  ?>  </p> 
                                

                              <?php endif  ?>
                            
                      <br> 
                       
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Thêm</button>

                    </form>
                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>