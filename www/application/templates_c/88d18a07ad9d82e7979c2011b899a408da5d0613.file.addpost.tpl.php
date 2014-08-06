<?php /* Smarty version Smarty-3.1.19, created on 2014-08-05 22:30:37
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\addpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:769553e1006a5901f2-85474914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88d18a07ad9d82e7979c2011b899a408da5d0613' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\addpost.tpl',
      1 => 1407263416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '769553e1006a5901f2-85474914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53e1006a596d84_46668095',
  'variables' => 
  array (
    'temp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e1006a596d84_46668095')) {function content_53e1006a596d84_46668095($_smarty_tpl) {?><div class="addpost">
    <form method="post" id="addpostform" action="">
        <input name="temp" id="temp" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
">
        <div class="rubric">
            <div class="label">
                Выберите рубрику:
            </div>
            <table id="rubricsTable">
                <tr>
                    <td>
                        <input name="postrubrics[][rubric_id]" type="checkbox" '.(isset($id)  && isset($post['rubric'][$rubric['rubric_id']]) ? 'checked':'').' value="'.$rubric['rubric_id'].'">
                    </td>
                    <td>

                    </td>
                </tr>
            </table>
        </div>
        <div class="label">
            название:
        </div>
        <textarea name="posts[post_name]" cols="60" rows="2"><<?php ?>?php if(isset($id))echo $post['name']; ?<?php ?>></textarea>
        <div class="label">
            Эпилог:
        </div>
        <textarea name="posts[post_epilog]" cols="60" rows="5"><<?php ?>?php if(isset($id))echo $post['epilog']; ?<?php ?>></textarea>
        <div class="passages">
            <<?php ?>?php
	 $count = 1;
	 if(isset($id))
	 {
		 foreach($post['passage'] as $pa_id => $row)
            {
            echo ('
            <div class="addPassage">
                <input name="passages['.$count.'][passage_id]" type="hidden" value="'.$pa_id.'">
                <div class="label">
                    название абзаца:
                </div>
                <textarea name="passages['.$count.'][passage_header]" cols="50" rows="3">'.$row['header'].'</textarea>
                <div class="label">
                    Добавьте изображение:
                </div>
                Тип изображения: <input name="passages['.$count.'][passage_imgtype]" '.(isset($id) && $row['img'] == 'gif' ? '' : 'checked').' type="radio" value="jpg" >jpg
                <input name="passages['.$count.'][passage_imgtype]" type="radio" '.(isset($id) && $row['img'] == 'gif' ? 'checked' : '').' value="gif">gif <br />
                Пометить как главное:
                <input name="passages['.$count.'][main]" type="checkbox" '.(isset($id) && $row['main'] == '1' ? 'checked' : '').' value="'.$count.'">
                <div id="addphoto'.$count.'" class="aPhoto">
                    <div id="upload'.$count.'" class="upload">
                        <span id="span'.$count.'" class="loadButton" imgName="temp'.$temp.$count.'">Загрузить</span>
                    </div>
                    <div id="preview'.$count.'" class="preview">
                        '.($id ?'<img src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$id.'/'.$pa_id.'.'.$row['img'].'" />':'').'
                        <input type="hidden" name="'.$count.'" value="images/pictures/big/'.$id.'/'.$pa_id.'" />
                        <span id="status'.$count.'" class="status"></span>
                    </div>
                </div><!--addphoto-->
                <div class="label">
                    текст абзаца:
                </div>
                <textarea name="passages['.$count.'][passage_text]" cols="50" rows="3">'.$row['text'].'</textarea>
                '.($count == count($post['passage'])?'
                <div class="passageButtons">
                    <div class="addMP" id="'.$count.'">
                        Еще абзац
                    </div>
                </div>
                ':'').'
            </div><!--addpassage-->
            ');
            $count++;
            }
            }
            else
            {
            $count=1;
            echo ('
            <div class="addPassage">
                <div class="label">
                    название абзаца:
                </div>
                <textarea name="passages['.$count.'][passage_header]" cols="50" rows="3"></textarea>
                <div class="label">
                    Добавьте изображение:
                </div>
                Тип изображения: <input name="passages['.$count.'][passage_imgtype]" '.(isset($id) && $row['img'] == 'gif' ? '' : 'checked').' type="radio" value="jpg" >jpg
                <input name="passages['.$count.'][passage_imgtype]" type="radio" '.(isset($id) && $row['img'] == 'gif' ? 'checked' : '').' value="gif">gif <br />
                Пометить как главное: <input name="passages['.$count.'][main]" type="checkbox" '.(isset($id) && $row['main'] == '1' ? 'checked' : '').' value="'.$count.'">
                <div id="addphoto'.$count.'" class="aPhoto">
                    <div id="upload'.$count.'" class="upload">
                        <span id="span'.$count.'" class="loadButton" imgName="temp'.$temp.$count.'">Загрузить</span>
                    </div>
                    <div id="preview'.$count.'" class="preview">
                        <input type="hidden" name="imgName['.$count.']" value="" />
                        <span id="status'.$count.'" class="status"></span>
                    </div>
                </div><!--addphoto-->
                <div class="label">
                    текст абзаца:
                </div>
                <textarea name="passages['.$count.'][passage_text]" cols="50" rows="3"></textarea>
                <div class="passageButtons">
                    <div class="addMP" id="'.$count.'">
                        Еще абзац
                    </div>
                </div>
            </div><!--addpassage-->
            ');
            }
            ?<?php ?>>
        </div><!--passages-->
        <div class="label">
            Пролог:
        </div>
        <textarea name="posts[post_prolog]" cols="60" rows="5"><<?php ?>?php if(isset($id))echo $post['prolog']; ?<?php ?>></textarea>
        <br />
        <input type="submit" value="Добавить пост" name="addPostButton">
    </form>
</div><?php }} ?>
