<!--选择构建服务器-->
	<div class="fileMain">
	<form id="select-jenkins" method="post" action="index.php?mod=web.ticket&act=build&id={$smarty.const.TICKET_ID}">
		<div class="projecName">
			<em>构建工程全称：</em>
			<span>
				<select name="jen_name" class="projec" action-type="act-pro-select" tabindex="1">
				{include file="web/ticket_jenkins_options.tpl" cache_lifetime=0 options=$list}
				</select>
			</span>
		</div>
		<div class="version-jenkins">
			<a href="javascript:;" class="delete btn" action-type="act-save-jenkins" tabindex="1">构 建</a> 
		</div>
        	</form>
	</div>
        <div class="ajax-callback-list">
        </div>
	<!--文件列表需要放到这里-->
