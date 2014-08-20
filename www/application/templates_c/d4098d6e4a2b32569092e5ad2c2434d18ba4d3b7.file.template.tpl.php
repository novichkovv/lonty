<?php /* Smarty version Smarty-3.1.19, created on 2014-08-19 18:00:01
         compiled from "/opt/lampp/htdocs/lonty.sru/www/application/templates/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28992358753f37481d5d293-95178621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4098d6e4a2b32569092e5ad2c2434d18ba4d3b7' => 
    array (
      0 => '/opt/lampp/htdocs/lonty.sru/www/application/templates/template.tpl',
      1 => 1408391927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28992358753f37481d5d293-95178621',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'meta' => 0,
    'styles' => 0,
    'item' => 0,
    'scripts' => 0,
    'template_dir' => 0,
    'fof' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f37481ed9f18_35770315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f37481ed9f18_35770315')) {function content_53f37481ed9f18_35770315($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <title>
  	<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

  </title>
  	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  	<?php echo $_smarty_tpl->tpl_vars['meta']->value;?>

  	<link rel="stylesheet" type="text/css" href="<?php echo @constant('SITE_DIR');?>
css/style.css" />
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    	<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

    <?php } ?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    	<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

    <?php } ?>
    <!--<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>-->
</head>
<body>
	<div class="headerArea">
		<div class="page">
			<div class="header">
				<div class="logo">
					<a href="/index/index"><img id="logo" src="<?php echo @constant('SITE_DIR');?>
images/main/logo.png" /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="contentArea">
	    <div class="page">
	    	<div class="content">
    		<?php if ($_smarty_tpl->tpl_vars['template_dir']->value==$_smarty_tpl->tpl_vars['fof']->value) {?>
	    		<div align="center">
	    			<h1>Ошибка 404</h1>
	    			</h1>Страница не существует!</h1>
	    		</div>
			<?php } else { ?>
				<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_dir']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>
			</div>
		</div>
	</div>
</body>

</html><?php }} ?>
