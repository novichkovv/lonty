<?php /* Smarty version Smarty-3.1.19, created on 2014-08-25 23:47:13
         compiled from "/home/u191001322/public_html/application/templates/index/rubrics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46885026953fbcb01affdb8-66350755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8542a411ae55a281224efd2d2b0df5bb38139dd' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/index/rubrics.tpl',
      1 => 1408996849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46885026953fbcb01affdb8-66350755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
    'pag' => 0,
    'page' => 0,
    'pages' => 0,
    'p' => 0,
    'right_posts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fbcb01c0a042_78142708',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fbcb01c0a042_78142708')) {function content_53fbcb01c0a042_78142708($_smarty_tpl) {?><div class="maincontent">
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
index/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['post']->value['post_name'];?>

                </a>
            </h1>
            <div class="postInfo">
                <div class="postDate">
                    <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/dateIcon.png" alt="date" title="Дата" />
                    <?php echo $_smarty_tpl->tpl_vars['post']->value['day'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['month'];?>

                    <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/markIcon.png" alt="date" title="Рубрики" />
                    <span class="rubrics"><?php echo $_smarty_tpl->tpl_vars['post']->value['rubrics'];?>
</span>
                </div>
            </div><!--postInfo-->
            <div class="cutImg">
                <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                    <img class="bigImg" src="<?php echo @constant('SITE_DIR');?>
images/pictures/bigCut/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
.jpg" />
                </a>
            </div>
            <div class="postText">
                <?php echo $_smarty_tpl->tpl_vars['post']->value['post_epilog'];?>

            </div>
            <div class="readMore">
                <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
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
            <a id="firstBut" class="activePageBut" href="<?php echo @constant('SITE_DIR');?>
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
    <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['right_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
        <div class="rightPost">
            <div class="medImg">
                <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                    <img class=mediumImg" src="<?php echo @constant('SITE_DIR');?>
images/pictures/bigCut/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
.jpg" />
                </a>
            </div>
            <div class="rightText">
                <a href="<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_name'];?>
</a>
            </div>
        </div>
    <?php } ?>
    <script type="text/javascript">/

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div><!--rightcontent--><?php }} ?>