<?php
	 require_once __DIR__. "/autoload/autoload.php";
	 $sql="SELECT sanpham.*   FROM sanpham  WHERE  Trangthai = 0";
      
       
       $timenow = date("Y-m-d");

       $chuaban= $db->fetchJone("sanpham",$sql,1,2,false,'MaSP');
       // print_r(json_encode($chuaban));
       foreach ($chuaban as $key => $value) {
       		if ($timenow > $value['ThoiHan'])
       			{
       				$data=
       				[
       					"Trangthai"=> 1
       				];
       				 $id_update= $db->update('sanpham',$data, array("MaSP"=>$value['MaSP']));
       			}

       }

?>