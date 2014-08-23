<?php /* Smarty version Smarty-3.1.19, created on 2014-08-24 00:04:49
         compiled from "Z:\home\lonty.sru\www\application\templates\index\post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2895353f8e89a88d6c8-27274523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd2a28433c99b75e9390a01bf6961bbee1cec049' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\index\\post.tpl',
      1 => 1408824288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2895353f8e89a88d6c8-27274523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8e89a88e621_75218838',
  'variables' => 
  array (
    'post' => 0,
    'passage' => 0,
    'right_posts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8e89a88e621_75218838')) {function content_53f8e89a88e621_75218838($_smarty_tpl) {?><div class="maincontent">
    <div class="post">
        <h1>
            <<?php ?>?php echo $post['post_name']; ?<?php ?>>
        </h1>
        <div class="postInfo">
            <div class="postDate">
                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/dateIcon.png" alt="date" title="Дата" />
                <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['day'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['month'];?>

                <img class="dateIcon" src="<?php echo @constant('SITE_DIR');?>
images/main/markIcon.png" alt="date" title="Рубрики" />
                <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['rubrics'];?>

            </div>
        </div><!--postInfo-->
        <div class="postText">
            <?php echo $_smarty_tpl->tpl_vars['post']->value[0]['name'];?>

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
    </div><!--post-->
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
