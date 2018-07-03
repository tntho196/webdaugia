<?php
    $open='product';
     require_once __DIR__. "/../../autoload/autoload.php";

    $id=getInput('id');
    $delete= $db->fetchID('sanpham',$id, 'MaSP');

    if(empty($delete))
    {
        $_SESSION['error']= "Dứ liệu không tồn tại";
        redirectAdmin('product');
    }
    $id_delete= $db->delete('sanpham', $id, 'MaSP');
            if($id_delete > 0)
            {
                $_SESSION['success']= "Xóa thành công";
                redirectAdmin('product');

            }
            else
            {
                // thêm thất bại
                $_SESSION['error']= "Xóa thất bại";
                redirectAdmin('product');
            }


  ?>