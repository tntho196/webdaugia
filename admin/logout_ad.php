<?php  require_once __DIR__. "/../autoload/autoload.php";  
    if(isset($_SESSION['name_ad_id']))
    {
        unset($_SESSION['name_ad_id']);
        echo " <script>location.href='login_ad.php'</script>" ;
    }
?>