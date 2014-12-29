<?php /* Smarty version Smarty-3.1.19, created on 2014-08-25 18:35:47
         compiled from "/home/u191001322/public_html/application/templates/index/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128587326253fb82034a1313-05584302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ab009d054b4167916560705068932dac1e663e1' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/index/post.tpl',
      1 => 1409004121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128587326253fb82034a1313-05584302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
    'passage' => 0,
    'get' => 0,
    'description' => 0,
    'right_posts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fb8203536c95_46655322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb8203536c95_46655322')) {function content_53fb8203536c95_46655322($_smarty_tpl) {?><div class="maincontent">
    <div class="post">
        <h1>
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['name'];?>

        </h1>
        <div class="postInfo">
            <div class="postDate">
                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/dateIcon.png" alt="date" title="Дата" />
                <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['day'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['month'];?>

                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/markIcon.png" alt="date" title="Рубрики" />
                <span class="rubrics"><?php echo $_smarty_tpl->tpl_vars['post']->value[0]['rubrics'];?>
</span>
            </div>
        </div><!--postInfo-->
        <div class="postText">
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['epilog'];?>

        </div>
        <?php  $_smarty_tpl->tpl_vars['passage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['passage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['passage']->key => $_smarty_tpl->tpl_vars['passage']->value) {
$_smarty_tpl->tpl_vars['passage']->_loop = true;
?>
            <div class="passageText">
                <?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_header'];?>

            </div>
            <div class="fullsizeImg">
                <img class="bigImg" src="<?php echo @constant('SITE_DIR');?>
images/pictures/big/<?php echo $_smarty_tpl->tpl_vars['post']->value[0]['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
.<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_imgtype'];?>
" />
            </div>

            <div class="postText">
                <?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_text'];?>

            </div>
        <?php } ?>
        <div class="postText">
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['prolog'];?>

        </div>
    </div><!--post-->
    <div align="center">
    <script type="text/javascript">
        <!--
        document.write(VK.Share.button({
                url: '<?php echo @constant('SITE_DIR');?>
index/post/<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
',
                title: '<?php echo $_smarty_tpl->tpl_vars['post']->value[0]['name'];?>
',
                description: '<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
',
                image: '<?php echo @constant('SITE_DIR');?>
images/pictures/bigCut/<?php echo $_smarty_tpl->tpl_vars['get']->value[0];?>
.jpg',
                noparse: true},
                    {type: 'custom', text: '<img src="<?php echo @constant('SITE_DIR');?>
images/main/vk_share.jpg" />'}

        ));
        -->
    </script>
    </div>
</div><!--maincontent-->
<div class="rightcontent">
    <div align="center"><h1>Lonty Рекоммендует</h1></div>
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
</div><!--rightcontent--><?php }} ?>
