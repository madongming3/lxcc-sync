<?php /* Smarty version 2.6.26, created on 2018-04-23 11:11:54
         compiled from web/ticket_menu.tpl */ ?>
<div class="front-nav">
<div class="mainNav">
	<a href="/index.php?mod=web.ticket&act=mine" class="<?php if ($this->_tpl_vars['curr_tpl'] == 'web/ticket_mine.tpl'): ?> Cur<?php endif; ?>">我的上线单</a>
	<a href="/index.php?mod=web.ticket&act=latest" class="<?php if ($this->_tpl_vars['curr_tpl'] == 'web/ticket_latest.tpl'): ?> Cur<?php endif; ?>">最新上线单</a>
	<a href="/index.php?mod=web.ticket&act=search" class="<?php if ($this->_tpl_vars['curr_tpl'] == 'web/ticket_search.tpl'): ?> Cur<?php endif; ?>">搜索</a>
	<a href="/index.php?mod=web.ticket&act=faq" class="last<?php if ($this->_tpl_vars['curr_tpl'] == 'web/ticket_faq.tpl'): ?> Cur<?php endif; ?>">安全CASE</a>
</div>
<div class="lookover">
<form id="index_form" method="GET" action="/index.php">
<input type="hidden"  name="mod" value="web.ticket"/>
<input type="hidden"  name="act" value="detail"/>
	<input type="text"  name="id" value="请输入上线单号" tabindex="1" action-type="act-placeholder"
	<?php if (@TICKET_NEXT_ID): ?>
	action-data="建议单号：<?php echo @TICKET_NEXT_ID; ?>
"/>　
	<?php else: ?>
	action-data="请输入上线单号"/>　
	<?php endif; ?>
	<a action-type="act-exist" tabindex="2" href="###" class="btn">查看</a>
	<a action-type="act-create" tabindex="3" href="###" class="btn">新建</a>
</form>
</div>
</div>