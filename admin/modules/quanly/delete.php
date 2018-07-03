<?php
    $open='quanly';
     require_once __DIR__. "/../../autoload/autoload.php";

    $id=getInput('id');
    $delete= $db->fetchID('admin',$id, 'username');

    if(empty($delete))
    {
        $_SESSION['error']= "Dứ liệu không tồn tại";
        redirectAdmin('quanly');
    }
    $id_delete= $db->delete('admin', $id, 'username');
            if($id_delete > 0)
            {
                $_SESSION['success']= "Xóa thành công";
                redirectAdmin('quanly');

            }
            else
            {
                // thêm thất bại
                $_SESSION['error']= "Xóa thất bại";
                redirectAdmin('quanly');
            }


  ?>