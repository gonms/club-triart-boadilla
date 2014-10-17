<?php /* Smarty version Smarty-3.1.15, created on 2014-10-13 06:42:38
         compiled from "../templates/calendario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39130519452a2fbea58f035-44418558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f58a861059608365f8ca485f8a50b3ff1f5917ac' => 
    array (
      0 => '../templates/calendario.tpl',
      1 => 1413196955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39130519452a2fbea58f035-44418558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a2fbea63b895_60544349',
  'variables' => 
  array (
    'nombreMes' => 0,
    'ano' => 0,
    'calendario' => 0,
    'dia' => 0,
    'eventos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a2fbea63b895_60544349')) {function content_52a2fbea63b895_60544349($_smarty_tpl) {?><h2><?php echo $_smarty_tpl->tpl_vars['nombreMes']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
</h2>
<ul>
	<li class="day">L</li>
	<li class="day">M</li>
	<li class="day">X</li>
	<li class="day">J</li>
	<li class="day">V</li>
	<li class="day">S</li>
	<li class="day">D</li>

	<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['calendario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value) {
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
		<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>

	<?php } ?>
</ul>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['evento'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['name'] = 'evento';
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eventos']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['evento']['total']);
?>
<div class="capa" id="evento_<?php echo $_smarty_tpl->tpl_vars['eventos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['evento']['index']]['dia'];?>
">
    <p onclick="$('.capa').hide();"><img width="25" height="25" alt="" src="img/btnClose.png"></p>
    <div>
    	<p><?php echo $_smarty_tpl->tpl_vars['eventos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['evento']['index']]['hora'];?>
h.</p>
    	<h2><?php echo $_smarty_tpl->tpl_vars['eventos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['evento']['index']]['titulo'];?>
</h2>
    </div>
</div>
<?php endfor; endif; ?>
<?php }} ?>
