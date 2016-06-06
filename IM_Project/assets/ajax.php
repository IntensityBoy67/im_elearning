<?php
$mysql_host = "localhost";
 $mysql_database = "im";
 $mysql_user = "root";
 $mysql_password = "";

 $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_select_db($mysql_database);

    if($_POST['act'] == 'rate'){
    	//search if the user(ip) has already gave a note
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];

    	$query = mysql_query("SELECT * FROM course_rating where ip= '$ip'  "); 
    	while($data = mysql_fetch_array($query)){
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
    		mysql_query("INSERT INTO course_rating (course, ip, rate)VALUES('$thepost', '$ip', '$therate')");
    	}else{
    		mysql_query("INSERT INTO course_rating (course, ip, rate)VALUES('$thepost', '$ip', '$therate')");
    	}
    } 
?>