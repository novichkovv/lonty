<div class="admin-panel">
    <a class="button-link" href="{$smarty.const.SITE_DIR}admin/">
        Панель
    </a>
    <span class="active-link">
        Добавить пост
    </span>
    <a class="button-link" href="{$smarty.const.SITE_DIR}admin/editpost/">
        Редактировать пост
    </a>
</div>
<h1 class="header">
	Создание нового поста
</h1>
<div class="addpost">
    <form method="post" id="addpostform" name="addpostform" action="">
        <div class="rubrics">
            <div class="label">
                Выберите рубрику:
            </div>
            <table class="rubricsTable">
            	<tbody id="rubricsTable">
	            {foreach from=$rubrics item=item}
	                <tr>
	                    <td>
	                        <input class="rubric_check" name="postrubrics[][rubric_id]" type="checkbox" value="{$item.rubric_id}">
	                    </td>
	                    <td>
	                    	{$item.rubric_name}
	                    </td>
	                </tr>
	            {/foreach}
            	<tbody>
            </table>
        </div>
        <div class="addRubric smallButton inline">Добавить рубрику</div>
        <div class="label">
            название:
        </div>
        <textarea name="posts[post_name]" id="post_name" cols="60" rows="2">{$smarty.post.posts.post_name}</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="2">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <div class="label">
            Эпилог:
        </div>
        <textarea name="posts[post_epilog]" cols="60" rows="5">{$smarty.post.posts.post_epilog}</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="5">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <div class="label">
            Пролог:
        </div>
        <textarea name="posts[post_prolog]" cols="60" rows="5">{$smarty.post.posts.post_prolog}</textarea>
        <div class="example">
	        <div class="example_button">
	        	развернуть
	        </div>
	        <div class="examle_holder">
	        	<textarea cols="60" rows="5">
	        	</textarea>
	        </div>
	        <div class="example_button hide">
	        	свернуть
	        </div>
	    </div>
        <br />
        <input type="submit" value="Добавить пост" id="addPostButton" name="addPostButton">
    </form>
</div>