<!DOCTYPE html>
<html>
<head>
  <title>
  	{$title}
  </title>
  	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  	{$meta}
  	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/css/style.css" />
    {$style}
    {$scripts}
    <!--<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>-->
</head>
<body>
	<div class="headerArea">
		<div class="page">
			<div class="header">
				<div class="logo">
					<a href="/index/index"><img id="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/main/logo.png" /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="contentArea">
	    <div class="page">
	    	<div class="content">
				{include file=$template_dir}
			</div>
		</div>
	</div>
</body>

</html>