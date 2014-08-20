<!DOCTYPE html>
<html>
<head>
  <title>
  	{$title}
  </title>
  	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  	{$meta}
  	<link rel="stylesheet" type="text/css" href="{$smarty.const.SITE_DIR}css/style.css" />
    {foreach from=$styles item=item}
    	{$item}
    {/foreach}
    {foreach from=$scripts item=item}
    	{$item}
    {/foreach}
    <!--<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>-->
</head>
<body>
	<div class="headerArea">
		<div class="page">
			<div class="header">
				<div class="logo">
					<a href="/index/index"><img id="logo" src="{$smarty.const.SITE_DIR}images/main/logo.png" /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="contentArea">
	    <div class="page">
	    	<div class="content">
    		{if $template_dir eq $fof}
	    		<div align="center">
	    			<h1>Ошибка 404</h1>
	    			</h1>Страница не существует!</h1>
	    		</div>
			{else}
				{include file=$template_dir}
			{/if}
			</div>
		</div>
	</div>
</body>

</html>