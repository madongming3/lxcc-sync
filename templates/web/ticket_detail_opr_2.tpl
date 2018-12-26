<div class="operate clearfix">
	{if $ticket[$smarty.const.WT_STATUS]==4}
	<form id="submit_test" action="/index.php?mod=web.ticket&act=subtest&id={$ticket[$smarty.const.WT_ID]}" method="POST">
	</form>
	<a href="javascript:;" class="testsubmit btn" action-type="act-submit-test">接口提测</a> {/if}
	{if $ticket[$smarty.const.WT_STATUS]==1}
	<a {if $smarty.const.CURRENT_UMOD&$smarty.const.USER_MOD_OPERATE_TICKET}
	class="btn" href="/index.php?mod=web.ticket&act=runtest&id={$smarty.const.TICKET_ID}"
	action-type="act-run-test" onclick="return false;" tabindex="3" 
	{else}title="没有对应的权限" class="without_want" {/if}>测试通过</a>
	<a {if $smarty.const.CURRENT_UMOD&$smarty.const.USER_MOD_SELECT_FILE}
    class="testfail btn"	href="/index.php?mod=web.ticket&act=runtest&id={$smarty.const.TICKET_ID}&status=3"
	action-type="act-run-testfail" onclick="return false;" tabindex="3"
	{else} title="没有对应的权限" class="without_select" {/if}>测试不通过</a>
	{/if}
	{if $ticket[$smarty.const.WT_STATUS]==2}
	<p align="center" style="color:green;font-weight:bold;">该上线单已测试通过，生命周期结束</p>
	{/if}
</div>

