<?php
/**
                +------------------------------------------------------------------------------+
                |                           上线系统       授权协议                            |
                |                  版权所有(c) 2013 VRITEAM团队. 保留所有权利                  |
                +------------------------------------------------------------------------------+
                |本软件的著作权归VRITEAM团队所有。具体使用许可请看软件包中的LICENSE文件。或者访|
                |问我们的网站http://www.vriteam.com/sync/license。我们欢迎给使用并给我们提出宝 |
                |贵的意见和建议。感谢团队中的成员为项目所做的努力！                            |
                +------------------------------------------------------------------------------+
                |                               作者：LIFEI                              |
                +------------------------------------------------------------------------------+

 */
/**
 * 新建一个服务器信息
 */
function robot_create_new($nr, $ip, $port, $prefix, $username, $password, $is_del) {

    $sql = sprintf("insert into %s (%s, %s, %s, %s, %s, %s, %s) values ('%s', '%s', %d, 
        '%s', '%s', '%s', %d)", ROBOT_SERVER_TABLE, DB_ROBOT_DESC, DB_ROBOT_IP, DB_ROBOT_PORT, DB_ROBOT_PATH, DB_ROBOT_USER,
    	DB_ROBOT_PASSWD, DB_ROBOT_DEL,	$nr, $ip, intval($port), $prefix, 
        $username, mysql_escape_passwd(sync_encrypt($password)),$is_del);

    return insert_update_db_by_sql($sql, true);
}
/**
 * 删除一个robot信息
 */
 
function robot_delete($s_id) {
    $sql = sprintf("update %s set %s = %d where %s = %d", 
        ROBOT_SERVER_TABLE, DB_ROBOT_DEL, ROBOT_CLOSE_TRUE, DB_ROBOT_ID, $s_id);
    return insert_update_db_by_sql($sql);
}

/**
 * 获取所有robot列表
 */
 
function robot_lists($page = FIRST_PAGE, $perpage = DEFAULT_PER_PAGE, $order = 's_id DESC') {
    static $cache   =  array();
    $lists          = array();
    $cache_key  = ROBOT_CACHE_LIST . "_" . $page . "_" . $perpage;
    if ( isset($cache[$cache_key]) && $cache[$cache_key] )
        return $cache[$cache_key];
    $limit_str = get_limit_str($page, $perpage);
    $sql = "SELECT * FROM " . ROBOT_SERVER_TABLE . " ORDER BY " .
        $order . $limit_str;
    $lists = get_row_from_db_by_sql($sql ,true);

    if ( sync_array($lists) ) 
        $cache[$cache_key] = $lists;
    return $lists;
}
/**
 * 获得一个服务器信息
 */
    /*
function server_get($s_id) {
    static $cache = array();
    if(isset($cache[$s_id]) && $cache[$s_id])
        return $cache[$s_id];
    $sql = sprintf("select * from %s where %s = %d", SYNC_SERVERS_TABLE, DB_SERVERS_ID, $s_id);
    $row = get_row_from_db_by_sql($sql);
    sync_log('Huo qu svn fu wu qi IP'.$row[s_ipv4]);
    if( sync_array($row) ){
   	    sync_log($row[DB_SERVERS_PASSWORD]);
		#$row[DB_SERVERS_PASSWORD] = sync_decrypt($row[DB_SERVERS_PASSWORD]);
        $cache[$s_id] = $row;
        return $row;
    }
    return array();
}
/**
 * 获取服务器总数
 */
    /*
function server_list_count() {
    $sql = sprintf("select count(%s) as num from %s", DB_SERVERS_ID, SYNC_SERVERS_TABLE);
    $count  = get_row_from_db_by_sql($sql);
    if ( sync_array($count) )
        return $count['num'];
    else
        return 0;
}
*/
/**
 * 获得一批robot信息
 */

function robot_get($s_ids) {
    static $cache = array();
    if( isset($cache[$s_ids]) && $cache[$s_ids])
        return $cache[$s_ids];
    $sql = sprintf("select * from %s where %s = %d ", ROBOT_SERVER_TABLE, DB_ROBOT_ID, $s_ids);
    $row = get_row_from_db_by_sql($sql);
    #sync_log('***********shi bu shi hen guanjian'.serialize($ret));
    if( sync_array($row) ){
   	    sync_log($row[DB_ROBOT_PASSWD]);
		$row[DB_ROBOT_PASSWD] = sync_decrypt($row[DB_ROBOT_PASSWD]);
        $cache[$s_id] = $row;
        return $row;
    }
    return array();
}
/**
 * 修改一个服务器信息
 */
function robot_update($s_id, $desc = null, $ip = null, $port = null,
    $prefix = null,  $username = null, $password = null,  $is_del = SERVER_CLOSE_FALSE) {

    $update      = true; //是否有更新的标示
    #先获得服务器信息
    $server_info = robot_get($s_id);
    if( !sync_array($server_info) )
        return false;
    $sql = sprintf("update %s set ", ROBOT_SERVER_TABLE);
    if ( isset($desc) && $desc != $server_info[ROBOT_INFO_KEY_DESC] )
        $sql .= sprintf("%s = '%s', ", DB_ROBOT_DESC, $desc);
    if ( isset($ip) && $ip != $server_info[DB_ROBOT_IP] )
        $sql .= sprintf("%s = '%s', ", DB_ROBOT_IP, $ip);
    if ( isset($port) && $port != $server_info[DB_ROBOT_PORT] )
        $sql .= sprintf("%s = %d, ", DB_ROBOT_PORT, (int)$port);
    if ( isset($prefix) && $prefix != $server_info[DB_ROBOT_PATH] )
        $sql .= sprintf("%s = '%s', ", DB_ROBOT_PATH, $prefix);
    if ( isset($username) && $username != $server_info[DB_ROBOT_USERNAME] )
        $sql .= sprintf("%s = '%s', ", DB_ROBOT_USER, $username);
    if ( isset($password) && $password != $server_info[DB_ROBOT_PASSWORD] )
        $sql .= sprintf("%s = '%s', ", DB_ROBOT_PASSWD, mysql_escape_passwd(sync_encrypt($password)));
    if ( isset($is_del) && (int)$is_del != $server_info[DB_ROBOT_DEL] )
        $sql .= sprintf("%s = %d, ", DB_ROBOT_DEL, (int)$is_del);
    if ( substr($sql, -4) == 'set ' )
        $update = false;
    if ( $update ) {
        $sql  = substr($sql, 0, -2);
        $sql .= sprintf(" where %s = %d", DB_ROBOT_ID, $s_id); 
        sync_log('                              '.$sql);
        return insert_update_db_by_sql($sql);
    }
    return true;
}
/**
 * 获取所有的svn服务器
 */
    /*
function server_get_svn_list() {
    return server_get_by_type(SERVER_TYPE_SVN);
}
*/
/**
 *  获取robot信息
 */
 function get_robot_info_byid($id){
 	static $cache = array();
 	if( isset($cache[$s_ids]) && $cache[$s_ids])
 		return $cache[$s_ids];
 	$sql=sprintf("select * from %s where %s =%d",ROBOT_SERVER_TABLE,DB_ROBOT_ID,$id);
 	$cache=get_row_from_db_by_sql($sql);
 	#sync_log('======================fan hui de path============='.$cache['r_path']);
 	if($cache) return $cache;
 	return '系统错误';
 }
 
 
 /**
  *  执行robot
  */
 function robot_run_do($info,$retry=FALSE){
 		static $cache=array();
 		if( isset($cache['ip']) && $cache['ip'])
 			return 1;
		$cache['ip']=(string)$info['r_ip'];
		$cache['port']=(int)$info['r_port'];
		$cache['username']=(string)$info['r_user'];
		$cache['password']=(string)sync_decrypt($info['r_passwd']);
		$conn=ssh_connect($cache);
		$lxcc=robot_ssh_do($conn,(string)$info['r_path']);
		if ($lxcc) return 1;
		else return 0;
 }

 
 function robot_ssh_do($conn,$path){
 	$av=array();
 	if (!$conn) return $av;
 	$cmd=sprintf("cd /u1/htdocs/www/robot_html/hui10card && sh %s %s",$path,TICKET_ID);
 	$stream=ssh2_exec($conn,$cmd);
 	stream_set_blocking($stream,true);
 	if($u=stream_get_contents($stream)){
 		$u=str_replace("\n",'@');
 		sync_log('--------------Check shell run result-----'.$u);
 	return true;}
 	else return FALSE;
 }
 
 function ticket_robottest_action($tid, $hid = null, $action = OP_TYPE_ROBOT_TIME,$status=4){
 	$info = ticket_info($tid);
 	$ol = $info[DB_SECTION_OP_LIST];
 	$fl    = $info[DB_SECTION_FILE_LIST];
 	$array = ticket_op_struct($action, $hid);
 	array_unshift($ol, $array);
 	$time = $array[OP_LIST_KEY_OPTIME];
 	return ticket_db_m($tid, $fl, $ol, $action, $time, $status);
 }
 
 
 /*
function server_get_file_list() {
    return server_get_by_type(SERVER_TYPE_FILE);
}
/**
 * 根据类型获取服务器列表
 */
    /*
function server_get_by_type($type = NULL) {
    static $cache   =  array();
    $lists          = array();
    $cache_key  = SERVER_CACHE_LIST . "_" . $type;
    if ( isset($cache[$cache_key]) && $cache[$cache_key] )
        return $cache[$cache_key];

    $sql = sprintf("select * from %s where %s = %d and %s = %d", SYNC_SERVERS_TABLE, 
        DB_SERVERS_DEL, SERVER_CLOSE_FALSE, DB_SERVERS_TYPE, $type);
    $lists = get_row_from_db_by_sql($sql ,true);

    if ( sync_array($lists) ) {
		foreach($lists as $k => &$v){
			$v[DB_SERVERS_PASSWORD] = sync_decrypt($v[DB_SERVERS_PASSWORD]);
			$cache[$v[DB_SERVERS_ID]] = $v;
		}
        $cache[$cache_key] = $lists;
	}
    return $lists;
}
/**
 * 获得svn服务器的上线分支地址
 */
    /*
function server_get_svn_uri($s_id) {
    $si = server_get($s_id);
    return $si[DB_SERVERS_SURI];
}
/**
 * 获得svn服务器的trunk地址
 */
    /*
function server_trunk_uri($s_id) {
    $si = server_get($s_id);
    return $si[DB_SERVERS_TURI];
}
/**
 * 获得svn服务器的trunk地址
 */
    /*
function server_prefix($s_id) {
    $si = server_get($s_id);
    return $si[DB_SERVERS_PREFIX];
}
/**
 * 获得svn服务器的trunk地址
 */
    /*
function server_ip($s_id) {
    $si = server_get($s_id);
    return $si[DB_SERVERS_IP];
}
/**
 * 获得svn服务器的描述
 */
    /*
function server_desc($s_id) {
    $si = server_get($s_id);
    return $si[DB_SERVERS_DESC];
}
/**
 * 获得文件服务器的绝对路径
 */
    /*
function server_abs_path($uri, $s_id) {
    return sync_trim_path(server_prefix($s_id)  . FS_DELIMITER . $uri);
}
/**
 * 判断一个server的类型
 */
    /*
function server_svn($s_type, $s_id = null) {
    if ( $s_id ) {
        $si = server_get($s_id);
        $s_type = intval($si[DB_SERVERS_TYPE]);
    }
    return $s_type == SERVER_TYPE_SVN ? true : false;
}
/**
 * 判断一个server的类型
 *//*
function server_file($s_type, $s_id = null) {
    if ( $s_id ) {
        $si = server_get($s_id);
        $s_type = intval($si[DB_SERVERS_TYPE]);
    }
    return $s_type == SERVER_TYPE_FILE ? true : false;
}
/**
 * 判断同描述服务器是否已经存在
 */
 
function robot_desc_exist($desc, $id = NULL) {
    $si = robot_get_by_desc($desc);
    if ( sync_array($si) && $si[DB_ROBOT_ID] > 0  && $si[DB_ROBOT_ID] != $id) 
        return true;
    else return false;
}
/**
 * 根据描述获取服务器信息
 */
   
function robot_get_by_desc($desc) {
    $server = array();
    if ( !$desc )  return $server;
    $sql = sprintf("select * from %s where %s = '%s'", ROBOT_SERVER_TABLE, DB_ROBOT_DESC, $desc);
    $row = get_row_from_db_by_sql($sql);
	$row[DB_ROBOT_PASSWORD] = sync_decrypt($row[DB_ROBOT_PASSWORD]);
	return $row;
}

