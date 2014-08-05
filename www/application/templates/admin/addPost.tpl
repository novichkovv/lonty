<div class="addpost">
    <form method="post" id="addpostform" action="">
        <input name="temp" id="temp" type="hidden" value="{$temp}">
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
        <textarea name="posts[post_name]" cols="60" rows="2"><?php if(isset($id))echo $post['name']; ?></textarea>
        <div class="label">
            Эпилог:
        </div>
        <textarea name="posts[post_epilog]" cols="60" rows="5"><?php if(isset($id))echo $post['epilog']; ?></textarea>
        <div class="passages">
            <?php
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
            ?>
        </div><!--passages-->
        <div class="label">
            Пролог:
        </div>
        <textarea name="posts[post_prolog]" cols="60" rows="5"><?php if(isset($id))echo $post['prolog']; ?></textarea>
        <br />
        <input type="submit" value="Добавить пост" name="addPostButton">
    </form>
</div>