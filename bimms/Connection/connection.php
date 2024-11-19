<?php






$conn = pg_connect("host=10.248.1.152 port=5432 dbname=TEST_BIMMS user=postgres password=1234");


/*SQL SERVER CREDENTIAL (CHANGE THIS INCASE OF CHANGE OF SERVER)*/

$server_name = "apbiphbpsdb02";

$conn_uid = "CAS_access";

$conn_pwd = "@BIPH2024";

$db = "Centralized_LOGIN_DB";
 
$connection = array("Database"=>$db, "UID"=>$conn_uid, "PWD"=>$conn_pwd);

$connsql =sqlsrv_connect($server_name, $connection);

$ip_client = $_SERVER['REMOTE_ADDR'];


if(!$connsql ){

    ?>
    <script>

alert('Cannot Connect');
    </script>
    <?php

}



/*WEB SERVER INFORMATION*/
$portNo = $_SERVER['SERVER_PORT'];
$serverName = getenv('COMPUTERNAME');

 
/*EMAIL-SMTP INFORMATION*/
$smtp_username = "ZZPYPH04";
$smtp_password = ".p&55worD";
$smtp_port = 25;

/*DATE TODAY GMT +8*/
date_default_timezone_set('Asia/Singapore');
$today_formated = date("Y-m-d");
$time_now = date("h:i:s A");
$today = date("F d, Y h:i A", time());




?>



