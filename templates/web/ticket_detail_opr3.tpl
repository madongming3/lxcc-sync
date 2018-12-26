 <div class="operate clearfix">
    {if $ticket[$smarty.const.WT_STATUS]==2}
    <a class="without_select">我要构建</a>
    {else}
	<a {if $smarty.const.CURRENT_UMOD&$smarty.const.USER_MOD_OPERATE_TICKET}
	class="btn" href="/index.php?mod=web.ticket&act=jenkins&id={$smarty.const.TICKET_ID}"
	action-type="act-choose-file" onclick="return false;" tabindex="3"
	{else}title="没有对应的权限" class="without_want" {/if}>我要构建</a>
	{/if}
</div>
