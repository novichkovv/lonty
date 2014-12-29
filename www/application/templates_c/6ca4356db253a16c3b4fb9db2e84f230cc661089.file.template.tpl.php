<?php /* Smarty version Smarty-3.1.19, created on 2014-08-26 04:49:33
         compiled from "/home/u191001322/public_html/application/templates/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78366306553fb807283c0c0-85994649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ca4356db253a16c3b4fb9db2e84f230cc661089' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/template.tpl',
      1 => 1409028371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78366306553fb807283c0c0-85994649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fb80728addb9_72231901',
  'variables' => 
  array (
    'title' => 0,
    'meta' => 0,
    'styles' => 0,
    'item' => 0,
    'scripts' => 0,
    'part' => 0,
    'auth' => 0,
    'template_dir' => 0,
    'fof' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb80728addb9_72231901')) {function content_53fb80728addb9_72231901($_smarty_tpl) {?><!DOCTYPE html>
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
    <script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
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
            <?php if ($_smarty_tpl->tpl_vars['part']->value[0]=='admin'&&!$_smarty_tpl->tpl_vars['auth']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ('admin/login_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    		<?php } elseif ($_smarty_tpl->tpl_vars['template_dir']->value==$_smarty_tpl->tpl_vars['fof']->value) {?>
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

<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=25978993&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/25978993/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:25978993,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25978993 = new Ya.Metrika({id:25978993,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25978993" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>

</html><?php }} ?>
