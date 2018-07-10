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

        $sql2="SELECT sanpham.*   FROM sanpham  WHERE  Trangthai = 1";
        $daban= $db->fetchJone("sanpham",$sql2,1,2,false,'MaSP');
        
        print_r($daban);
              foreach ($daban as $key) {
                     $nguoicaonhat=$db->fetchnguoi('ctdaugia',$key['MaSP']);
                     $max= $nguoicaonhat['MaThanhVien'];
                     if($nguoicaonhat!=NULL)
                     {
                            $data2=["NguoichienThang"=> $max ];
                             echo $max;
                             $id_update2= $db->update('sanpham',$data2, array("MaSP"=>$key['MaSP']));
                     }
                     else
                      $data2=["NguoichienThang"=> 1 ];
                     
                    
              }
              
       

?>