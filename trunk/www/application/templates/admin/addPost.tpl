<h1 class="header">
	Создание нового поста
</h1>
<div class="addpost">
    <form method="post" id="addpostform" action="">
        <input name="temp" id="temp" type="hidden" value="{$temp}">
        <div class="rubrics">
            <div class="label">
                Выберите рубрику:
            </div>
            <table class="rubricsTable">
            	<tbody id="rubricsTable">
	            {foreach from=$rubrics item=item}
	                <tr>
	                    <td>
	                        <input name="postrubrics[][rubric_id]" type="checkbox" value="'.$rubric['rubric_id'].'">
	                    </td>
	                    <td>
	                    	{$item.rubric_name}
	                    </td>
	                </tr>
	            {/foreach}
            	<tbody>
            </table>
        </div>
        <div class="addRubric">Добавить рубрику</div>
        <div class="label">
            название:
        </div>
        <textarea name="posts[post_name]" cols="60" rows="2">{$smarty.post.posts.post_name}</textarea>
        <div class="label">
            Эпилог:
        </div>
        <textarea name="posts[post_epilog]" cols="60" rows="5">{$smarty.post.posts.post_epilog}</textarea>
        <div class="label">
            Пролог:
        </div>
        <textarea name="posts[post_prolog]" cols="60" rows="5">{$smarty.post.posts.post_prolog}</textarea>
        <br />
        <input type="submit" value="Добавить пост" name="addPostButton">
    </form>
</div>