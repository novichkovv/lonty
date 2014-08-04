<?php /* Smarty version Smarty-3.1.19, created on 2014-08-04 18:42:29
         compiled from "Z:\home\lonty.sru\www\application\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2847853de6365699052-90552140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '823163ae0fbe349999bfcb5df407ff8e10cee5c0' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\index.tpl',
      1 => 1407163313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2847853de6365699052-90552140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53de6365a33609_17954266',
  'variables' => 
  array (
    'title' => 0,
    'meta' => 0,
    'style' => 0,
    'scripts' => 0,
    'template_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53de6365a33609_17954266')) {function content_53de6365a33609_17954266($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <title>
  	<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

  </title>
  	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  	<?php echo $_smarty_tpl->tpl_vars['meta']->value;?>

  	<link rel="stylesheet" type="text/css" href="http://<<?php ?>?php echo $_SERVER['HTTP_HOST'];?<?php ?>>/css/style.css" />
    <?php echo $_smarty_tpl->tpl_vars['style']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['scripts']->value;?>

    <!--<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>-->
</head>
<body>
	<div class="headerArea">
		<div class="page">
			<div class="header">
				<div class="logo">
					<a href="/index/index"><img id="logo" src="http://<<?php ?>?php echo $_SERVER['HTTP_HOST']?<?php ?>>/images/main/logo.png" /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="contentArea">
	    <div class="page">
	    	<div class="content">
				<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_dir']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
		</div>
	</div>
</body>

</html><?php }} ?>
