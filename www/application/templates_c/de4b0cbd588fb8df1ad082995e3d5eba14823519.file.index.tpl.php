<?php /* Smarty version Smarty-3.1.19, created on 2014-08-21 18:18:13
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197253f5ffa5639b18-23231160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4b0cbd588fb8df1ad082995e3d5eba14823519' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\index.tpl',
      1 => 1407507595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197253f5ffa5639b18-23231160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'item' => 0,
    'no_pas_posts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f5ffa5acdf97_81646985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f5ffa5acdf97_81646985')) {function content_53f5ffa5acdf97_81646985($_smarty_tpl) {?><div class="admin-panel">
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
admin/editpost/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
</div>
<h2>Посты без абзацев</h2>
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
				Рубрики
			</th>
			<th>
				Дата
			</th>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['no_pas_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>

			</td>
			<td>
				<a href="<?php echo @constant('SITE_DIR');?>
admin/editpost/<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_name'];?>
</a>
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['rubric_name'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['post_date'];?>

			</td>
		</tr>
	<?php } ?>
	</table>
</div><?php }} ?>