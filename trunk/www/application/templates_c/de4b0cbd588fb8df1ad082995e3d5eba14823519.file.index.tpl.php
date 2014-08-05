<?php /* Smarty version Smarty-3.1.19, created on 2014-08-05 20:02:32
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3251653df9d74374908-20953162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4b0cbd588fb8df1ad082995e3d5eba14823519' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\index.tpl',
      1 => 1407254549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3251653df9d74374908-20953162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53df9d743917f1_99089488',
  'variables' => 
  array (
    'posts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53df9d743917f1_99089488')) {function content_53df9d743917f1_99089488($_smarty_tpl) {?><div class="admin-panel">
	<a class="button-link" href="<?php echo @constant('SITE_DIR');?>
admin/addpost/">
		Добавить пост
	</a>
</div>
<div class="post-list">
	<table>
		<tr>
			<th>
				№
			</th>
			<th>
				Заголовок
			</th>
			<th>
				Абзацев
			</th>
			<th>
				Рубрики
			</th>
			<th>
				Дата
			</th>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

			</td>
			<td>
				<a href="<?php echo @constant('SITE_DIR');?>
admin/editPost/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['rubrics'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>

			</td>
		</tr>
	<?php } ?>
	</table>
</div><?php }} ?>
