<?php /* Smarty version Smarty-3.1.19, created on 2014-08-15 18:24:33
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\editpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:975553e535d719e118-03907685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bd52dc8d32f2f6ed64c8ecee96195f696cfe3ee' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\editpost.tpl',
      1 => 1408112669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '975553e535d719e118-03907685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53e535d74699b3_91556028',
  'variables' => 
  array (
    'get' => 0,
    'temp' => 0,
    'posts' => 0,
    'item' => 0,
    'rubrics' => 0,
    'name' => 0,
    'id' => 0,
    'passage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e535d74699b3_91556028')) {function content_53e535d74699b3_91556028($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['get']->value[0]) {?>
<h1 class="header">Не выбран пост</h1>
<?php } else { ?>
	<div class="form-editable editPost">
		<input name="temp" id="temp" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
">
		<div class="rubrics editable editable-list" data-type="checkbox" action="postrubrics" key="<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
" keyword="post_id">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value['rubrics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['rubric'];?>

			<?php } ?>
			<div class="editable-data">
			<table style="display: inline-block;">
				<?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rubrics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
				<tr>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

					</td>
					<td>
						<input name="postrubrics[rubric_id]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
					</td>
				</tr>
				<?php } ?>
			</table>
			</div>
		</div>
		<h1>
		<div class="post_name editable" action="posts" key="<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
" data-type="textarea" name="posts[post_name]"  style="margin: 40px 140px;">
			<?php echo $_smarty_tpl->tpl_vars['posts']->value['name'];?>

		</div>
		</h1>
		<div class="postText editable" action="posts" key="<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
" data-type="textarea" name="posts[post_epilog]" style="margin: 40px 100px;">
			<?php echo $_smarty_tpl->tpl_vars['posts']->value['epilog'];?>

		</div>
		<?php  $_smarty_tpl->tpl_vars['passage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['passage']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['posts']->value['passages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['passage']->key => $_smarty_tpl->tpl_vars['passage']->value) {
$_smarty_tpl->tpl_vars['passage']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['passage']->key;
?>
		<div class="passageText editable" action="passages" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" data-type="textarea" name="passages[passage_header]">
 			<?php echo $_smarty_tpl->tpl_vars['passage']->value['header'];?>

       	</div>
		<div class="fullsizeImg">
			<img class="bigImg editable" data-type="img" superkey="<?php echo $_smarty_tpl->tpl_vars['posts']->value['post_id'];?>
" img-type="<?php echo $_smarty_tpl->tpl_vars['passage']->value['img_type'];?>
" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" src="<?php echo @constant('SITE_DIR');?>
images/pictures/big/<?php echo $_smarty_tpl->tpl_vars['posts']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
.<?php echo $_smarty_tpl->tpl_vars['passage']->value['img_type'];?>
?<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
" />
		</div>
		<div class="passageText editable" action="passages" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" data-type="textarea" name="passages[passage_text]">
 			<?php if ($_smarty_tpl->tpl_vars['passage']->value['text']) {?><?php echo $_smarty_tpl->tpl_vars['passage']->value['text'];?>
<?php } else { ?><b class="btn small">добавить текст</b><?php }?>
       	</div>
		<?php } ?>
		<div class="postText editable" action="posts" key="<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
" data-type="textarea" name="posts[post_prolog]"  style="margin: 40px 100px;">
			<?php echo $_smarty_tpl->tpl_vars['posts']->value['prolog'];?>

		</div>
	</div>
<?php }?>

<script type="text/javascript">
</script>
<?php }} ?>
