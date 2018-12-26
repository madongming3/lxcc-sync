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
                |                               作者：lifei                           |
                +------------------------------------------------------------------------------+

 */
/**
 * 初始化方法
 */
function console_robot_init() {
    check_admin_user();
    define('CONSOLE_ID', (int)$_REQUEST['id']);
}

function console_robot_index(){
	$av=array();
	smt_append_tpl($av, ROBOT_CREATE_TPL);
	smt_append_title($av, ROBOT_TITLE_CREATE);
	return $av;
	
}  

/*创建robot服务器
 * */
function console_robot_docreate(){
	$av=array();
	$dt=get_post_dt();
	$av=val_data($dt);
	if ( err_get() === 0 ) robot_create($dt);	
	smt_append_json($av, '');//不渲染模板，json格式返回数据
	smt_append_href($av, ROBOT_ACTION_LIST);
	return $av;
}

function console_robot_list(){
	$av=array();
	
	$Page= ((int)$_REQUEST[INPUT_KEY_PAPE]>0) ? $_REQUEST[INPUT_KEY_PAPE] : 1;
	
	$r=console_robot_lists($Page,LIST_PER_PAGE);
	smt_append_list($av, $r);
	smt_append_page($av, get_page(server_list_count()));
	
	smt_append_title($av, SERVER_TITLE_LIST);
	#sync_log('^^^^^^^^^^^^^^^^ robot de zhongyao !!!::-----'.serialize($av));
	return $av;
		
}
/**
 * 创建，更新robot服务器
 */
function console_robot_create() {
	$av = array();
	$item = sync_format_robot_info(CONSOLE_ID);
	#sync_log('^^^^^^^^^^^^^^^&&&&&&&&&&&&&&&&&&&&&&&'.serialize($item));
	smt_append_item($av, $item);

	smt_append_title($av, ROBOT_TITLE_CREATE);
	return $av;
}

/**
 * 删除robot服务器
 */
function console_robot_delete() {
	$av     = array();

	//如果有关联项目那么不允许删除
	$server_used = robot_use(CONSOLE_ID);
	if ( $server_used ) {
		err_set(WARING_CODE);
		msg_set(SERVER_MESSAGE_SERVER_USED);
	} else
		robot_del(CONSOLE_ID);

	smt_append_json($av, '');

	return $av;
}
