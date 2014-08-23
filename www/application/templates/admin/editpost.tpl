{if !$get[0]}
<h1 class="header">Не выбран пост</h1>
{else}
	<div class="form-editable editPost">
		<input name="temp" id="temp" type="hidden" value="{$temp}">
		<input name="post_id" id="post_id" type="hidden" value="{$get[0]}">
		<div class="rubrics editable editable-list" data-type="checkbox" action="postrubrics" key="{$get[0]}" keyword="post_id">
			{foreach from=$posts.rubrics item=item}
				{$item.rubric}
			{/foreach}
			<div class="editable-data">
			<table style="display: inline-block;">
				{foreach from=$rubrics key=id item=name}
				<tr>
					<td>
						{$name}
					</td>
					<td>
						<input name="postrubrics[rubric_id]" type="checkbox" value="{$id}">
					</td>
				</tr>
				{/foreach}
			</table>
			</div>
		</div>
		<h1>
		<div class="post_name editable" action="posts" key="{$get[0]}" data-type="textarea" name="posts[post_name]"  style="margin: 40px 140px;">
			{$posts.name}
		</div>
		</h1>
		<div class="postText editable" action="posts" key="{$get[0]}" data-type="textarea" name="posts[post_epilog]" style="margin: 40px 100px;">
			{$posts.epilog}
		</div>
		{foreach from=$posts.passages key=id item=passage}
		<div class="passageText editable" action="passages" key="{$passage.passage_id}" data-type="textarea" name="passages[passage_header]">
 			{$passage.header}
       	</div>
		<div class="fullsizeImg">
			<img class="bigImg editable" data-type="img" superkey="{$posts.post_id}" img-type="{$passage.img_type}" key="{$passage.passage_id}" src="{$smarty.const.SITE_DIR}images/pictures/big/{$posts.post_id}/{$passage.passage_id}.{$passage.img_type}?{$temp}" />
		</div>
		<div class="passageText editable" action="passages" key="{$passage.passage_id}" data-type="textarea" name="passages[passage_text]">
 			{if $passage.text}{$passage.text}{else}<b class="btn small">добавить текст</b>{/if}
       	</div>
		{/foreach}
		<div class="passage">
			<div class="button addPassage">Дабавить абзац</div>
		</div>
		<div class="postText editable" action="posts" key="{$get[0]}" data-type="textarea" name="posts[post_prolog]"  style="margin: 40px 100px;">
			{$posts.prolog}
		</div>
	</div>
{/if}
{literal}
<script type="text/javascript">
</script>
{/literal}