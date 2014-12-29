<?php /* Smarty version Smarty-3.1.19, created on 2014-08-25 18:31:04
         compiled from "/home/u191001322/public_html/application/templates/admin/addpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188370810453fb80e86b47d1-88884128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4636d98059e2117f7b34abefb0234dd649e7c10' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/admin/addpost.tpl',
      1 => 1408996849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188370810453fb80e86b47d1-88884128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rubrics' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fb80e86e63d0_03608766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb80e86e63d0_03608766')) {function content_53fb80e86e63d0_03608766($_smarty_tpl) {?><div class="admin-panel">
    <a class="button-link" href="<?php echo @constant('SITE_DIR');?>
admin/">
        Панель
    </a>
    <span class="active-link">
        Добавить пост
    </span>
    <a class="button-link" href="<?php echo @constant('SITE_DIR');?>
admin/editpost/">
        Редактировать пост
    </a>
</div>
<h1 class="header">
	Создание нового поста
</h1>
<div class="addpost">
    <form method="post" id="addpostform" name="addpostform" action="">
        <div class="rubrics">
            <div class="label">
                Выберите рубрику:
            </div>
            <table class="rubricsTable">
            	<tbody id="rubricsTable">
	            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rubrics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	                <tr>
	                    <td>
	                        <input class="rubric_check" name="postrubrics[][rubric_id]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['rubric_id'];?>
">
	                    </td>
	                    <td>
	                    	<?php echo $_smarty_tpl->tpl_vars['item']->value['rubric_name'];?>

	                    </td>
	                </tr>
	            <?php } ?>
            	<tbody>
            </table>
        </div>
        <div class="addRubric smallButton inline">Добавить рубрику</div>
        <div class="label">
            название:
        </div>
        <textarea name="posts[post_name]" id="post_name" cols="60" rows="2"><?php echo $_POST['posts']['post_name'];?>
</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="2">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <div class="label">
            Эпилог:
        </div>
        <textarea name="posts[post_epilog]" cols="60" rows="5"><?php echo $_POST['posts']['post_epilog'];?>
</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="5">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <div class="label">
            Пролог:
        </div>
        <textarea name="posts[post_prolog]" cols="60" rows="5"><?php echo $_POST['posts']['post_prolog'];?>
</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="5">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <br />
        <input type="submit" value="Добавить пост" id="addPostButton" name="addPostButton">
    </form>
</div><?php }} ?>
