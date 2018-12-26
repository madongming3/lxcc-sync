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
                |                               作者：lf                        |
                +------------------------------------------------------------------------------+

 */
/*
 * 用户管理配置文件 
 */
#input键值定义
define('ROBOT_ACTION_ROBOT',                '/index.php?mod=console.robot');
define('ROBOT_CREATE_TPL',					'console/robot_create.tpl');
define('ROBOT_ACTION_DOCREATE',             ROBOT_ACTION_ROBOT.'&act=docreate');
define('ROBOT_ACTION_CREATE',	ROBOT_ACTION_ROBOT.'&act=create');
define('ROBOT_ACTION_DELETE',	ROBOT_ACTION_ROBOT.'&act=delete');
define('ROBOT_TITLE_CREATE',                'robot服务创建');
define('ROBOT_INPUT_NAME',                  'nrobot');
define('ROBOT_INPUT_IP',                    'ip');
define('ROBOT_INPUT_PORT',				    'port');
define('ROBOT_INPUT_PREFIX',                'wwwroot');
define('ROBOT_INPUT_USER_NAME',     'username');
define('ROBOT_INPUT_PASSWORD',                 'password');
define('ROBOT_CLOSE_TRUE',             1);
define('ROBOT_CLOSE_FALSE',            0);
define('ROBOT_INPUT_IS_DEL',           'is_del');
define('ROBOT_ACTION_LIST',            ROBOT_ACTION_ROBOT . '&act=list');
define('ROBOT_MESSAGE_DESC',           '已经有同名称的服务器存在');

define('ROBOT_CACHE_LIST',             'robots_list');