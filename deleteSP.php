<?php
 require_once __DIR__. "/autoload/autoload.php";
$id=getInput('id');
    
    if(empty($delete))
    {
        $_SESSION['error']= "Dứ liệu không tồn tại";
        
    }
    $id_delete= $db->delete('sanpham', $id, 'MaSP');
            if($id_delete > 0)
            {
                
                echo " <script> alert('Xóa Thành công  ');location.href='info_myuser.php'</script>" ;
                

            }
            else
            {
                // thêm thất bại
                
                echo " <script> alert('Xóa Thất bại  ');location.href='info_myuser.php'</script>" ;
                
            }

  ?>