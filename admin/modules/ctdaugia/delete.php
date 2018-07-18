<?php
	 $open='ctdaugia';
      require_once __DIR__. "/../../../autoload/autoload.php";

    $id=getInput('id');
    $delete= $db->fetchID('ctdaugia',$id, 'MaCT');

    if(empty($delete))
    {
        $_SESSION['error']= "Dữ liệu không tồn tại";
        redirectAdmin('product');
    }
    $id_delete= $db->delete('ctdaugia', $id, 'MaCT');
            if($id_delete > 0)
            {
                $_SESSION['success']= "Xóa thành công";
                redirectAdmin('ctdaugia');

            }
            else
            {
                // thêm thất bại
                $_SESSION['error']= "Xóa thất bại";
                redirectAdmin('ctdaugia');
            } 

 ?>