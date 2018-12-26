<div class="operate clearfix">
	<a {if $smarty.const.CURRENT_UMOD&$smarty.const.USER_MOD_OPERATE_TICKET}
	class="btn" href="/index.php?mod=web.ticket&act=selrobot&id={$smarty.const.TICKET_ID}"
	action-type="act-sel-robot" onclick="return false;" tabindex="3"
	{else}title="没有对应的权限" class="without_want" {/if}>执行robot</a>
	{if $ticket[$smarty.const.WT_STATUS]==4 || $ticket[$smarty.const.WT_STATUS]==1}
	<div {if $ticket[$smarty.const.WT_PASS]>80} style="float:right;margin-right:50px; margin-top:0px; width:200px; height:50px; background- color:White;color:green"
	{else} style="float:right;margin-right:50px; margin-top:0px; width:200px; height:50px; background- color:White;color:red" {/if}>
	robot测试通过率：<br>
	通过率：{$ticket[$smarty.const.WT_PASS]}%
	</div>
	{/if}
</div>
