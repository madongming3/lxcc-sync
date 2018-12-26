<?php

function mysql_conn(){
	$conn=mysqli_connect('localhost:3306','work','ceshi2016');
	if ($conn){
		echo "connecting succes!!\n";
		mysqli_select_db($conn,'sync');
		return $conn;
	}
	else{
		echo 'lian jie shi bai!!';
	}
	
}

function mysql_chaxun(){
		$connect=mysql_conn();
		$sqli=mysql_mksql();
		$result=mysqli_query($connect,$sqli);
		if($result)
		var_dump($result);
	}

function mysql_mksql(){
		$name='admin';
		$no=0;
		$sql=sprintf("select * from sync_users where s_username = '%s' and s_del = %d",$name,$no);
		return $sql;	

}
mysql_chaxun();

?>
