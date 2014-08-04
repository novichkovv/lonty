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
				Кол-во абзацев
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
				{$item.name}
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