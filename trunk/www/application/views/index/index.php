<div class="maincontent">
<?php
$countPage=1;
foreach($posts as $key=>$row)
{
	$date=date_create($row['post_date']);
	$day=date_format($date, 'd');
	$month=$this->monthes(date_format($date, 'm'));
	$rubrics=array();
	if($row['rubric'])
	foreach($row['rubric'] as $key=>$rubric)
	{
		$rubrics[]='<a href="http://'.$_SERVER['HTTP_HOST'].'/index/rubric/'.$rubric['rubric_id'].'">'.$rubric['rubric_name'].'</a>';
	}
	if(is_array($rubrics))$rubrics=implode(',', $rubrics);
	$countPage++;
	echo ('
	<div class="post">
		<h1>
		<a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">
		'.$row['post_name'].'
		</a>
		</h1>
		<div class="postInfo">
			<div class="postDate">
				<img class="dateIcon" src="http://'.$_SERVER['HTTP_HOST'].'/images/main/dateIcon.png" alt="date" title="Дата" />
					'.$day.' '.$month.'
				<img class="dateIcon" src="http://'.$_SERVER['HTTP_HOST'].'/images/main/markIcon.png" alt="date" title="Рубрики" />
					'.$rubrics.'
			</div>
		</div><!--postInfo-->
		<div class="cutImg">
			<a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">
				<img class="bigImg" src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/cut/'.$row['post_id'].'/'.$row['passage_id'].'.'.$row['passage_imgtype'].'" />
		    </a>
		</div>
		<div class="postText">
			'.mb_substr($row['post_epilog'],0, 200, 'utf-8').'
		</div>
		<div class="readMore">
			<a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">Читать дальше...</a>
		</div>
	</div><!--post-->
');
}
?>

	<div class="pageList">
	<?php
	if($page==1)
	echo ('
		<div id="firstBut" class="blockedPageBut">
			Первая
		</div>
		<div id="prevBut" class="blockedPageBut">
			Предыдущая
		</div>
	');
	else
	{
		$prev=$page-1;
	echo ('
		<a id="firstBut" class="activePageBut" href="http://'.$_SERVER['HTTP_HOST'].'/index/index/1">
			Первая
		</a>
		<a id="firstBut" class="activePageBut" href="http://'.$_SERVER['HTTP_HOST'].'/index/index/'.$prev.'">
			Предыдущая
		</a>
	');
	}
	switch($page)
	{
		case '1':
		$start=1;
		$active=1;
		break;
		case '2':
		$start=1;
		$active=2;
		break;
		case '1':
		$start=2;
		$active=3;
		break;
		default:
		$start=$page-2;
		$active=$page;

	}
	for($i=$start; $i<($start+5)&&$i<=($postsAmount/$limit); $i++)
	{
		if($i==$active)
		{
			echo ('
			<div class="pageBut" id="activePageBut">
				'.$i.'
			</div>
			');
		}
		else
		{
			echo ('
			<a class="pageBut" href="http://'.$_SERVER['HTTP_HOST'].'/index/index/'.$i.'">'.$i.'</a>
			');
		}
	}
	if($page<($postsAmount/$limit))
	{
		$nextPage=$page+1;
		echo ('
	 	<a id="nextBut" href="http://'.$_SERVER['HTTP_HOST'].'/index/index/'.$nextPage.'">Следующая</a>
		<a id="lastBut" href="http://'.$_SERVER['HTTP_HOST'].'/index/index/'.$countPage.'">Последняя</a>
		');
	}
	else
		echo ('
		<div id="firstBut" class="blockedPageBut">
			Следующая
		</div>
		<div id="prevBut" class="blockedPageBut">
			Последняя
		</div>
		');
	?>
	</div><!--pagelist-->
</div><!--maincontent-->
<div class="rightcontent">
	    <script type="text/javascript">

    <!--

    document.write(VK.Share.button({
 	 url: 'http://pro-gorod.com',
  		title: 'Хороший сайт',
  	description: 'Это мой собственный сайт, я его очень долго делал',
  	image: 'http://pro-gorod.com/pictures/firmspics/orehovo_zuevo/14.jpg',
  	noparse: true
}));

    -->
    </script>
	<div align="center"><h1>Lonty Рекоммендует</h1></div>
	<?php
    if($rightPosts)
    {
        foreach($rightPosts as $k => $row)
        {
            echo ('
		<div class="rightPost">
			<div class="medImg">
				<a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">
					<img class="mediumImg" src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$row['post_id'].'/'.$row['passage_id'].'.jpg" />
				</a>
			</div>
			<div class="rightText">
				'.$row['post_name'].'
			</div>
		</div><!--rightpost-->
		');
        }
    }

	?>
	<div class="rightPost">
		<div class="medImg">
			<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/3.jpg" />
		</div>
		<div class="rightText">
			Это наверное худшие свадебные фотки всех времен, ни одной нет хорошей
		</div>
	</div><!--rightpost-->
	<div class="rightPost">
		<div class="medImg">
			<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/4.jpg" />
		</div>
		<div class="rightText">
			Эти 28 причудливых факта заставят Вас почесать голову. Что если какие-то из них - правда?
		</div>
	</div><!--rightpost-->
	<div class="rightPost">
		<div class="medImg">
			<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/5.png" />
		</div>
		<div class="rightText">
			Эти истории заставят вас пересмотреть свое отношение к бездомным. Кто бы знал, что что-то, написанное
			на картонке, может так трогать!
		</div>
	</div><!--rightpost-->
</div><!--rightcontent-->