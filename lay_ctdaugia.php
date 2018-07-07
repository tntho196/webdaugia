<?php require_once __DIR__. "./autoload/autoload.php"; 

 ?>

<?php
	$id=getInput('id');

	$sql="SELECT ctdaugia.*,thanhvien.TenDangNhap as username, CONCAT(thanhvien.Ho,' ',thanhvien.ten) as hoten FROM ctdaugia,thanhvien  WHERE  ctdaugia.MaThanhVien = thanhvien.MaThanhVien and ctdaugia.MaSP='$id' ORDER BY GiaMuonDau DESC ";
	if(isset($_GET['page']))
        {
            $p=$_GET['page'];
        }
        else
        {
            $p=1;
        }

	$maxgia=$db->maxsql('ctdaugia','GiaMuonDau',$id,'MaSP');


    $ctdaugia= $db->fetchJone("ctdaugia",$sql,$p,2,false,'MaCT');

    $data = array();

    $data['maxgia'] = $maxgia;
    $data['ctdaugia'] = $ctdaugia;

    print_r(json_encode($data));
?>