<?php /* Smarty version Smarty-3.1.15, created on 2018-02-07 09:34:58
         compiled from "../templates/noticias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11958170935a7ac842589d74-35974530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00174362a5721db6782e13a11f62fab9908b8b83' => 
    array (
      0 => '../templates/noticias.tpl',
      1 => 1517930174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11958170935a7ac842589d74-35974530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'noticias' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5a7ac8425aaf49_32117610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7ac8425aaf49_32117610')) {function content_5a7ac8425aaf49_32117610($_smarty_tpl) {?><ul class="noticias">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['name'] = 'noticia';
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['noticias']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['noticia']['total']);
?>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['noticia']['first']) {?>
	<li class="first">
	<?php } else { ?>
	<li>
	<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['imagen']!='') {?>
		<a href="http://gestor.clubtriartboadilla.com/docs/<?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['imagen'];?>
" target="_blank"><img src="http://gestor.clubtriartboadilla.com/docs/<?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['imagen'];?>
" /></a>
		<?php }?>
		<h2><?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['titulo'];?>
</h2>
		<h3><?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['fecha'];?>
</h3>
		<p><?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['cuerpo'];?>
</p>
		<?php if ($_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['documento']!='') {?>
		<a href="http://gestor.clubtriartboadilla.com/docs/<?php echo $_smarty_tpl->tpl_vars['noticias']->value[$_smarty_tpl->getVariable('smarty')->value['section']['noticia']['index']]['documento'];?>
">ver documento</a>
		<?php }?>
	</li>
<?php endfor; endif; ?>
</ul><?php }} ?>
