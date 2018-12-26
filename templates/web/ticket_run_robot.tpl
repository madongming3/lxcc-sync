<!--同步后结果开始-->
<div class="mask-scroll-y">
	<div class="document">
		<ul class="fileList">
			<li>
			<h4>{$ticket.nrobot} (ip:{$ticket.r_ip})</h4>
{if $ticket.is_suc}
	<span style="color:green">远程路径:{$ticket.r_path}&nbsp;&nbsp;&nbsp;执行结果：执行成功</span>
{else}
	<span style="color:red">远程路径:{$ticket.r_path}&nbsp;&nbsp;&nbsp;执行结果：执行失败</span>
{/if}
			</li>
		</ul>
	</div>
	    <form id="robot-clo" method="post" class="mask-scroll-y" action="index.php?id={$smarty.const.TICKET_ID}&mod=web.ticket&act=robot_clo">
	    </form>
		<div class="handy act-choose">　
			<a href="javascript:;" class="delete btn" action-type="act-robot-true" tabindex="1">确认执行</a> 
		</div>
</div>
<!--同步结果结束-->
