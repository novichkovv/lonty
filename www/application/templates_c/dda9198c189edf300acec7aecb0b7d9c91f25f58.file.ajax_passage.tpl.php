<?php /* Smarty version Smarty-3.1.19, created on 2014-08-26 05:17:23
         compiled from "/home/u191001322/public_html/application/templates/admin/ajax_passage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199249231653fc1863c35ad3-40370456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dda9198c189edf300acec7aecb0b7d9c91f25f58' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/admin/ajax_passage.tpl',
      1 => 1408815978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199249231653fc1863c35ad3-40370456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'passage' => 0,
    'temp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fc1863cab9d3_14970190',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fc1863cab9d3_14970190')) {function content_53fc1863cab9d3_14970190($_smarty_tpl) {?><div class="passageText editable" action="passages" key="<?php echo $_smarty_tpl->tpl_vars['passage']->value['passage_id'];?>
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
