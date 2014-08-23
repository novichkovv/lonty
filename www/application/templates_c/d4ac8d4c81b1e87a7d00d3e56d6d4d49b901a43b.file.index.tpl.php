<?php /* Smarty version Smarty-3.1.19, created on 2014-08-23 13:46:00
         compiled from "Z:\home\lonty.sru\www\application\templates\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1333353f759a129c828-45907143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4ac8d4c81b1e87a7d00d3e56d6d4d49b901a43b' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\index\\index.tpl',
      1 => 1408787159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1333353f759a129c828-45907143',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f759a12b31a3_35386163',
  'variables' => 
  array (
    'posts' => 0,
    'post_id' => 0,
    'post' => 0,
    'rubric' => 0,
    'posy_id' => 0,
    'pag' => 0,
    'page' => 0,
    'pages' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f759a12b31a3_35386163')) {function content_53f759a12b31a3_35386163($_smarty_tpl) {?><div class="maincontent">


    
    
    
    
    
    
    
    
    
    
    
    
    
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['post_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['post_id']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
    <div class="post">
        <h1>
            <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
">
                <?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>

            </a>
        </h1>
        <div class="postInfo">
            <div class="postDate">
                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/dateIcon.png" alt="date" title="Дата" />
                '.$day.' '.$month.'
                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/markIcon.png" alt="date" title="Рубрики" />
                <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rubric']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['rubrics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value) {
$_smarty_tpl->tpl_vars['rubric']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['rubric']->value['rubric'];?>
 <?php } ?>
            </div>
        </div><!--postInfo-->
        <div class="cutImg">
            <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
">
                <img class="bigImg" src="<?php echo @constant('SITE_DIR');?>
images/pictures/bigCut/<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
.jpg" />
            </a>
        </div>
        <div class="postText">
            <?php echo $_smarty_tpl->tpl_vars['post']->value['epilog'];?>

        </div>
        <div class="readMore">
            <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['posy_id']->value;?>
">Читать дальше...</a>
        </div>
    </div><!--post-->
<?php } ?>
<div class="pageList">
    <?php if ($_smarty_tpl->tpl_vars['pag']->value['unfirst']) {?>
	<div id="firstBut" class="blockedPageBut">
        Первая
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pag']->value['unprev']) {?>
    <div id="prevBut" class="blockedPageBut">
        Предыдущая
    </div>
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['pag']->value['unfirst']) {?>
    <a id="firstBut" class="activePageBut" href="<?php echo @constant('SITE_DIR');?>
index/index/1">
        Первая
    </a>
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['pag']->value['unfirst']) {?>
    <a id="firstBut" class="activePageBut" href=<?php echo @constant('SITE_DIR');?>
index/index/<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
">
        Предыдущая
    </a>
    <?php }?>


    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['p']->value) {?>
            <div class="pageBut" id="activePageBut">
                <?php echo $_smarty_tpl->tpl_vars['p']->value;?>

            </div>
        <?php } else { ?>
            <a class="pageBut" href="<?php echo @constant('SITE_DIR');?>
index/index/<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a>
        <?php }?>
    <?php } ?>

    <?php if (!$_smarty_tpl->tpl_vars['pag']->value['unnext']) {?>
    <a id="nextBut" href="<?php echo @constant('SITE_DIR');?>
index/index/<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">Следующая</a>
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['pag']->value['unlast']) {?>
    <a id="lastBut" href="<?php echo @constant('SITE_DIR');?>
index/index/<?php echo $_smarty_tpl->tpl_vars['pag']->value['last'];?>
">Последняя</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pag']->value['unnext']) {?>
    <div id="firstBut" class="blockedPageBut">
        Следующая
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pag']->value['unlast']) {?>
    <div id="prevBut" class="blockedPageBut">
        Последняя
    </div>
    <?php }?>
</div><!--pagelist-->
</div><!--maincontent-->
<div class="rightcontent">
    <script type="text/javascript">

//        <!--
//
//        document.write(VK.Share.button({
//            url: 'http://pro-gorod.com',
//            title: 'Хороший сайт',
//            description: 'Это мой собственный сайт, я его очень долго делал',
//            image: 'http://pro-gorod.com/pictures/firmspics/orehovo_zuevo/14.jpg',
//            noparse: true
//        }));
//
//        -->
    </script>
    <div align="center"><h1>Lonty Рекоммендует</h1></div>
    <div class="rightPost">
        <div class="medImg">
            <a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">
                <img class="mediumImg" src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$row['post_id'].'/'.$row['passage_id'].'.jpg" />
            </a>
        </div>
        <div class="rightText">
            '.$row['post_name'].'
        </div>
    </div><!--rightpost-->

    <div class="rightPost">
        <div class="medImg">
            <img class=mediumImg" src="http://<<?php ?>?php echo $_SERVER['HTTP_HOST']?<?php ?>>/images/pictures/medium/3.jpg" />
        </div>
        <div class="rightText">
            Это наверное худшие свадебные фотки всех времен, ни одной нет хорошей
        </div>
    </div><!--rightpost-->
    <div class="rightPost">
        <div class="medImg">
            <img class=mediumImg" src="http://<<?php ?>?php echo $_SERVER['HTTP_HOST']?<?php ?>>/images/pictures/medium/4.jpg" />
        </div>
        <div class="rightText">
            Эти 28 причудливых факта заставят Вас почесать голову. Что если какие-то из них - правда?
        </div>
    </div><!--rightpost-->
    <div class="rightPost">
        <div class="medImg">
            <img class=mediumImg" src="http://<<?php ?>?php echo $_SERVER['HTTP_HOST']?<?php ?>>/images/pictures/medium/5.png" />
        </div>
        <div class="rightText">
            Эти истории заставят вас пересмотреть свое отношение к бездомным. Кто бы знал, что что-то, написанное
            на картонке, может так трогать!
        </div>
    </div><!--rightpost-->
</div><!--rightcontent--><?php }} ?>
