<?php
$date=date_create($post['post_date']);
	$day=date_format($date, 'd');
	$month=$this->monthes(date_format($date, 'm'));
?>
<div class="maincontent">
	<div class="post">
		<h1>
		<?php echo $post['post_name']; ?>
		</h1>
		<div class="postInfo">
			<div class="postDate">
				<img class="dateIcon" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/main/dateIcon.png" alt="date" title="Дата" />
					<?php echo $day.' '.$month; ?>
				<img class="dateIcon" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/main/markIcon.png" alt="date" title="Рубрики" />
					<?php
					$rubrics=array();
					foreach($post['rubric'] as $key=>$rubric)
					{

						$rubrics[]='<a href="http://'.$_SERVER['HTTP_HOST'].'/index/rubric/'.$rubric['rubric_id'].'">'.$rubric['rubric_name'].'</a>';

					}
					echo implode(',', $rubrics);
					 ?>
			</div>
		</div><!--postInfo-->
		<div class="postText">
		<?php echo $post['post_epilog']; ?>
		</div>
		<?php
        foreach($post['passage'] as $key=>$passage)
        {        	echo ('
        	<div class="passageText">
        		'.$passage['passage_header'].'
        	</div>
			<div class="fullsizeImg">
				<img class="bigImg" src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$post['post_id'].'/'.$passage['passage_id'].'.'.$passage['passage_imgtype'].'" />
			</div>
			');
		}
		?>
		<div class="postText">
			<?php echo $post['post_prolog']; ?>
		</div>

	</div><!--post-->
</div><!--maincontent-->
<div class="rightcontent">
	<div align="center"><h1>Lonty Рекоммендует</h1></div>
	<?php
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
	?>
	<div class="rightPost">
		<div class="medImg">
			<img class="mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/3.jpg" />
		</div>
		<div class="rightText">
			Это наверное худшие свадебные фотки всех времен, ни одной нет хорошей
		</div>
	</div><!--rightpost-->
	<div class="rightPost">
		<div class="medImg">
			<img class="mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/4.jpg" />
		</div>
		<div class="rightText">
			Эти 28 причудливых факта заставят Вас почесать голову. Что если какие-то из них - правда?
		</div>
	</div><!--rightpost-->
	<div class="rightPost">
		<div class="medImg">
			<img class="mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/5.png" />
		</div>
		<div class="rightText">
			Эти истории заставят вас пересмотреть свое отношение к бездомным. Кто бы знал, что что-то, написанное
			на картонке, может так трогать!
		</div>
	</div><!--rightpost-->
</div><!--rightcontent-->