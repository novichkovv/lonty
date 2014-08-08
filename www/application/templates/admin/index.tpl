<div class="admin-panel">
	<a class="button-link" href="{$smarty.const.SITE_DIR}admin/addpost/">
		Добавить пост
	</a>
</div>
<div class="post-list">
	<table>
		<tr>
			<th>
				№
			</th>
			<th>
				Заголовок
			</th>
			<th>
				Абзацев
			</th>
			<th>
				Рубрики
			</th>
			<th>
				Дата
			</th>
		</tr>
	{foreach from=$posts item=item}
		<tr>
			<td>
				{$item.id}
			</td>
			<td>
				<a href="{$smarty.const.SITE_DIR}admin/editpost/{$item.id}">{$item.name}</a>
			</td>
			<td>
				{$item.amount}
			</td>
			<td>
				{$item.rubrics}
			</td>
			<td>
				{$item.date}
			</td>
		</tr>
	{/foreach}
	</table>
</div>
<h2>Посты без абзацев</h2>
<div class="post-list">
	<table>
		<tr>
			<th>
				№
			</th>
			<th>
				Заголовок
			</th>
			<th>
				Рубрики
			</th>
			<th>
				Дата
			</th>
		</tr>
	{foreach from=$no_pas_posts item=item}
		<tr>
			<td>
				{$item.post_id}
			</td>
			<td>
				<a href="{$smarty.const.SITE_DIR}admin/editpost/{$item.post_id}">{$item.post_name}</a>
			</td>
			<td>
				{$item.rubric_name}
			</td>
			<td>
				{$item.post_date}
			</td>
		</tr>
	{/foreach}
	</table>
</div>