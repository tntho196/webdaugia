<?php
	require_once __DIR__. "/autoload/autoload.php";
	if(isset($_GET['page']))
       {
           $p=$_GET['page'];
       }
       else
       {
           $p=1;
       }
	$id = $_GET['id'];
	$sql="SELECT sanpham.* FROM sanpham WHERE NguoichienThang =$id ";
	$Show_sp_win=$db->fetchJone("sanpham",$sql,$p,2,false,'MaSP');
	print_r(json_encode($Show_sp_win));
?>