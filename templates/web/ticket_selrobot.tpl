<form id="run-robot" action="/index.php?mod=web.ticket&act=runrobot&id={$smarty.const.TICKET_ID}" method="POST">
	<div class="wantTongList">
	<h3>robot服务列表</h3>
		{foreach from=$ticket key='k' item='item' name='ro_list'}
		<div class="listFei">
			<ul>
				<li>
					<input type="checkbox" value="{$item.id}"
					{if $smarty.foreach.item_list.total == 1}checked="checked"{/if} name="robot" tabindex="1">
					<span>{$item.nrobot} (ip:{$item.r_ip})</span>
				</li>
			</ul>
		</div>
		{/foreach}
		<div class="clearfix"></div>
	</div>
	<div style="color:blue">
	<h2 id="onehang" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;脚本已后台运行，运行完成后，会自行跳转请耐心等待！</h2>
	</div>
	<div class="export">
		<a href="javascript:;" class="btn" action-type="act-run-robot" tabindex="1">执行</a>
	</div>
</form>
