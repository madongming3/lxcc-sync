<option value="0">请选择</option>
{foreach from=$options item='option'}
<option value="{$option.pn}" {if $smarty.cookies.pgid == $option.pv || $smarty.cookies.pname == $option.pv}
selected="selected"{/if}>{$option.pn|truncate:30:'':TRUE}</option>
{/foreach}
