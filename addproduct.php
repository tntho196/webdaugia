<?php require_once __DIR__. "/layouts/header.php";  ?> 
<?php
        
    $id_loaisp=$db->fetchAll("loaisp");
    if(!isset($_SESSION['name_user']))
    {
         echo " <script> alert('bạn phải Đăng nhập để Post sản phẩm  ');location.href='index.php'</script>" ;
    }
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data =
        [
            "TenSP"=> postInput('TenSP'),
            "GiaKhoiDiem"   => postInput('price'),
            "NguoiBan"   => $_SESSION['name_id'],
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
                $file_type =$_FILES['thunbar']['type'];
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

                    

                }
                else
                {
                    // thêm thất bại
                    $_SESSION['error']= "Thêm mới thất bại";
                }
              
            
        }
        


    }
  ?>
               
            <div class="row">
                <div class="col-md-6 ">
                    <legend><i class="glyphicon glyphicon-globe"></i></a> Đăng tải Sản Phẩm !
                    </legend>
                        <?php if(isset($_SESSION['success'])) :  ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']);  ?>
                                </div>
                            <?php endif;  ?>

                            <?php if(isset($_SESSION['error'])) :  ?>
                                <div class="alert alert-danger  ">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']);  ?>
                                </div>
                            <?php endif;  ?>
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
                           
                            
                            
                            <label  class="control-lable" > Giá </label>
                            <input class="form-control" name="price" placeholder="Giá Khởi Điểm" type="text"> 
                            <?php
                                if(isset($error['price'])): ?>
                                
                                    <p class="text-danger"> <?php echo  $error['price'] ?>  </p> 
                            
                              <?php endif  ?>
                            
                   
                            <br>
                            <label>Thông tin sản phẩm</label>
                            <textarea id="froala-editor" class="form-control" name="content"></textarea>
                            <script>
                              $(function() {
                                $('textarea#froala-editor').froalaEditor()
                              });
                            </script>
                            <?php
                                if(isset($error['content'])): ?>
                                
                                    <p class="text-danger"> <?php echo  $error['content'] ?>  </p> 
                            
                              <?php endif  ?>

                           
                            <br>
                            <label class="control-lable">Thời hạn </label>
                            <br>
                            <input class="form-control" name="ThoiHan" placeholder="Thời Hạn " type="date">
                            <label for="inputAnh " class="control-lable">Hình Ảnh</label>
                            <input type="file" class="form-control" id="inputAnh" name="thunbar">
                             <?php
                                if(isset($error['thunbar'])): ?>
                                
                                    <p class="text-danger"> <?php echo $error['thunbar']  ?>  </p> 
                                

                              <?php endif  ?>
                            
                      <br> 
                       
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng Lên</button>

                    </form>
                </div>
            </div>   

                        

                    </div>
                </div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>
                