<?php /* Smarty version Smarty-3.1.19, created on 2014-08-24 11:03:53
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\ajax_passage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1165553f64a03c3cbf1-92285315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e31bcccbeb136b6af20764e6cc8a70bc2414f2f8' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\ajax_passage.tpl',
      1 => 1408801578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1165553f64a03c3cbf1-92285315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f64a04063e17_68770325',
  'variables' => 
  array (
    'passage' => 0,
    'temp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a04063e17_68770325')) {function content_53f64a04063e17_68770325($_smarty_tpl) {?><div class="passageText editable" action="passages" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" data-type="textarea" name="passages[passage_header]">
    <?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_header'];?>

</div>
<div class="fullsizeImg">
    <img class="bigImg editable" data-type="img" superkey="<?php echo $_smarty_tpl->tpl_vars['passage']->value['post_id'];?>
" img-type="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_imgtype'];?>
" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" src="<?php echo @constant('SITE_DIR');?>
images/pictures/big/<?php echo $_smarty_tpl->tpl_vars['passage']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
.<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_imgtype'];?>
?<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
" />
</div>
<div class="passageText editable" action="passages" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
" data-type="textarea" name="passages[passage_text]">
    <?php if ($_smarty_tpl->tpl_vars['passage']->value['passage_text']) {?><?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_text'];?>
<?php } else { ?><b class="btn small">добавить текст</b><?php }?>
</div>
<div class="passage">
    <div class="button addPassage">Дабавить абзац</div>
</div><?php }} ?>
