<?php
    $open='user';
     require_once __DIR__. "/../../autoload/autoload.php";

    $id=getInput('id');
    $delete= $db->fetchID('thanhvien',$id, 'MaThanhVien');

    if(empty($delete))
    {
        $_SESSION['error']= "Dữ liệu không tồn tại";
        redirectAdmin('user');
    }
    $id_delete= $db->delete('thanhvien', $id, 'MaThanhVien');
            if($id_delete > 0)
            {
                $_SESSION['success']= "Xóa thành công";
                redirectAdmin('user');

            }
            else
            {
                // thêm thất bại
                $_SESSION['error']= "Xóa thất bại";
                redirectAdmin('user');
            }


  ?>