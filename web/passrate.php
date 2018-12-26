<?php

//require '../lib/mysql.php';
function web_passrate_get(){
    $conn= get_mysql_connection2();
    $q="select passrate from test_pass_rate order by id desc limit 1";//设置查询指令
    $result=mysqli_query($conn,$q) or die("出错了！");//执行查询
    //输出结果
    while ($row = mysqli_fetch_row($result)){
    	foreach($row as $passrate){
    		echo $passrate.'',"\n";
    		return $passrate;
    	}
    }
    //关闭数据库
    mysqli_free_result($result);
    mysqli_close($conn);
}

function web_passrate_totxt(){
    //保存输出结果到txt文件
    $ps=web_passrate_get();
    $file = '/testprj/soft/sync/web/passrate.txt';
    $fopen = fopen($file, 'a+');//写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
    fwrite($fopen, $ps.'');     //保存到txt文件
    fwrite($fopen,"\n");     
    fclose($fopen);
}

function web_passrate_save(){
    //保存在测试独立服务器 的数据库中
    $sid=(int)$_REQUEST['id'];
    sync_log('&&&&&&&&shu ju lei xing shi'.$sid);
    $ps=web_passrate_get();
    $passr=substr($ps,0,-1);//切割字符串，将%去掉
    $pass_rate = (int)$passr;//将字符串转换为int型
    $mysql_conn = get_mysql_connection();
	//$sq="update sync_tickets set pass_rate = $pass_rate where s_trac_id = $sid"; //设置插入数据指令
	$sq=sprintf("update sync_tickets set pass_rate = %d where s_trac_id =%d",$pass_rate,$sid);
    $result= mysqli_query($mysql_conn,$sq); //执行查询
	if (!$result){
         die('出错了: ' . mysqli_error());
	}
	if(err_get()) {
	    return err_get();
	}
	mysqli_close($mysql_conn);
}

?>