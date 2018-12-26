<ul class="fileList act-file-list">
{if $ticket[$smarty.const.JK_INFO]}
{foreach from=$ticket[$smarty.const.JK_INFO] item='item'  name='jenkins'}
<li>
<span><img src="/static/frontEnd/img/{$item[$smarty.const.WT_PC]}" border="0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
　{$smarty.foreach.jenkins.iteration}.
项目：<strong>{$item[$smarty.const.JK_PROJECT]}</strong>，
日期：{$item[$smarty.const.JK_DATE]}，
构建者：{$item[$smarty.const.JK_USER]}，
状态：{$item[$smarty.const.JK_STATUS]}
<br />
</span>
</li>
{/foreach}
{else}
<p class="none clearfix"><img src="/static/core/img/none.png" border="0">　<span>没有构建项目</span></p>
{/if}
</ul>

