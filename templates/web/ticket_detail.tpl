{if $ticket}
<div class="present">
{include file="web/ticket_detail_sum.tpl"}
</div>
{include file="web/ticket_detail_opr3.tpl"}
<div class="document">
<div class="help clearfix"><a href="##" action-type="act-get-help">帮助</a>
<div class="clearfix"></div>
<div class="helpExplain" style="display:none">
</div>
</div>
<p><font size="2" face="arial" color="red">jenkins构建列表仅展示最近三次构建的历史！！记录生成后请2分钟后再执行自动化脚本</font></p>
{include file="web/ticket_jenkins_fls.tpl"}
<br/>
<div><p class="none"><img src="../../static/frontEnd/img/fenge1.png"></p></div>
<br/>
{include file="web/ticket_detail_opr.tpl"}
<form id="detail_list" action="/index.php?mod=web.ticket&act=delete&id={$ticket[$smarty.const.WT_ID]}" method="POST">
{include file="web/ticket_detail_fls.tpl"}
</form>
<div class="handy">
<input type="checkbox" value="" name="" action-type="all"> 全选
<input type="checkbox" value="" name="" action-type="reverse"> 反选
<a href="javascript:;" class="delete btn" action-type="act-delete-file">删除</a> 
</div>
</div>
{include file="web/ticket_robot_run.tpl"}
{if $ticket[$smarty.const.WT_STATUS]==4 || $ticket[$smarty.const.WT_STATUS]==2 || $ticket[$smarty.const.WT_STATUS]==3 || $ticket[$smarty.const.WT_STATUS]==1}
<a href="http://223.223.184.83:8066/{$ticket[$smarty.const.WT_PATH]}/report.html" target="_blank" style="color:blue;">
查看详细报告请点击此链接
</a>
{/if}
{include file="web/ticket_detail_opr_2.tpl"}
<div class="historyMain">
<div class="see" id="see">查看历史</div>
<ul class="seeList">
{include file="web/ticket_detail_his.tpl"}
</ul>
</div>
{elseif $msg}
<p class="none"><img src="../../static/core/img/none.png" border="0"> <span>{$msg}</span></p>
{else}
<p class="none"><img src="../../static/core/img/none.png" border="0">　<span>上线单{$smarty.const.TICKET_ID}不存在! </span></p>
{/if}
