<div class="maincontent">
    {foreach from=$posts key=post_id item=post}
        <div class="post">
            <h1>
                <a href="{$smarty.const.SITE_DIR}index/post/{$post.post_id}">
                    {$post.post_name}
                </a>
            </h1>
            <div class="postInfo">
                <div class="postDate">
                    <img class="dateIcon" src="{$smarty.const.SITE_DIR}images/main/dateIcon.png" alt="date" title="Дата" />
                    {$post.day} {$post.month}
                    <img class="dateIcon" src="{$smarty.const.SITE_DIR}images/main/markIcon.png" alt="date" title="Рубрики" />
                    <span class="rubrics">{$post.rubrics}</span>
                </div>
            </div><!--postInfo-->
            <div class="cutImg">
                <a href="{$smarty.const.SITE_DIR}index/post/{$post.post_id}">
                    <img class="bigImg" src="{$smarty.const.SITE_DIR}images/pictures/bigCut/{$post.post_id}.jpg" />
                </a>
            </div>
            <div class="postText">
                {$post.post_epilog}
            </div>
            <div class="readMore">
                <a href="{$smarty.const.SITE_DIR}index/post/{$post.post_id}">Читать дальше...</a>
            </div>
        </div><!--post-->
    {/foreach}
    <div class="pageList">
        {if $pag.unfirst}
            <div id="firstBut" class="blockedPageBut">
                Первая
            </div>
        {/if}
        {if $pag.unprev}
            <div id="prevBut" class="blockedPageBut">
                Предыдущая
            </div>
        {/if}
        {if !$pag.unfirst}
            <a id="firstBut" class="activePageBut" href="{$smarty.const.SITE_DIR}index/index/1">
                Первая
            </a>
        {/if}
        {if !$pag.unfirst}
            <a id="firstBut" class="activePageBut" href="{$smarty.const.SITE_DIR}index/index/{$page-1}">
                Предыдущая
            </a>
        {/if}


        {foreach from=$pages item=p}
            {if $page eq $p}
                <div class="pageBut" id="activePageBut">
                    {$p}
                </div>
            {else}
                <a class="pageBut" href="{$smarty.const.SITE_DIR}index/index/{$p}">{$p}</a>
            {/if}
        {/foreach}

        {if !$pag.unnext}
            <a id="nextBut" href="{$smarty.const.SITE_DIR}index/index/{$page+1}">Следующая</a>
        {/if}
        {if !$pag.unlast}
            <a id="lastBut" href="{$smarty.const.SITE_DIR}index/index/{$pag.last}">Последняя</a>
        {/if}
        {if $pag.unnext}
            <div id="firstBut" class="blockedPageBut">
                Следующая
            </div>
        {/if}
        {if $pag.unlast}
            <div id="prevBut" class="blockedPageBut">
                Последняя
            </div>
        {/if}
    </div><!--pagelist-->
</div><!--maincontent-->
<div class="rightcontent">
    {foreach from=$right_posts item=post}
        <div class="rightPost">
            <div class="medImg">
                <a href="{$smarty.const.SITE_DIR}index/post/{$post.post_id}">
                    <img class=mediumImg" src="{$smarty.const.SITE_DIR}images/pictures/bigCut/{$post.post_id}.jpg" />
                </a>
            </div>
            <div class="rightText">
                <a href="{$smarty.const.SITE_DIR}index/post/{$post.post_id}">{$post.post_name}</a>
            </div>
        </div>
    {/foreach}
    <script type="text/javascript">/

        {*//        <!--*}
        {*//*}
        {*//        document.write(VK.Share.button({*}
        {*//            url: 'http://pro-gorod.com',*}
        {*//            title: 'Хороший сайт',*}
        {*//            description: 'Это мой собственный сайт, я его очень долго делал',*}
        {*//            image: 'http://pro-gorod.com/pictures/firmspics/orehovo_zuevo/14.jpg',*}
        {*//            noparse: true*}
        {*//        }));*}
        {*//*}
        {*//        -->*}
        {*</script>*}
        {*<div align="center"><h1>Lonty Рекоммендует</h1></div>*}
        {*<div class="rightPost">*}
        {*<div class="medImg">*}
        {*<a href="http://'.$_SERVER['HTTP_HOST'].'/index/post/'.$row['post_id'].'">*}
        {*<img class="mediumImg" src="http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$row['post_id'].'/'.$row['passage_id'].'.jpg" />*}
        {*</a>*}
        {*</div>*}
        {*<div class="rightText">*}
        {*'.$row['post_name'].'*}
        {*</div>*}
        {*</div><!--rightpost-->*}

        {*<div class="rightPost">*}
        {*<div class="medImg">*}
        {*<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/3.jpg" />*}
        {*</div>*}
        {*<div class="rightText">*}
        {*Это наверное худшие свадебные фотки всех времен, ни одной нет хорошей*}
        {*</div>*}
        {*</div><!--rightpost-->*}
        {*<div class="rightPost">*}
        {*<div class="medImg">*}
        {*<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/4.jpg" />*}
        {*</div>*}
        {*<div class="rightText">*}
        {*Эти 28 причудливых факта заставят Вас почесать голову. Что если какие-то из них - правда?*}
        {*</div>*}
        {*</div><!--rightpost-->*}
        {*<div class="rightPost">*}
        {*<div class="medImg">*}
        {*<img class=mediumImg" src="http://<?php echo $_SERVER['HTTP_HOST']?>/images/pictures/medium/5.png" />*}
        {*</div>*}
        {*<div class="rightText">*}
        {*Эти истории заставят вас пересмотреть свое отношение к бездомным. Кто бы знал, что что-то, написанное*}
        {*на картонке, может так трогать!*}
        {*</div>*}
        {*</div><!--rightpost-->*}
        </div><!--rightcontent-->