<div class="maincontent">
    <div class="post">
        <h1>
            <?php echo $post['post_name']; ?>
        </h1>
        <div class="postInfo">
            <div class="postDate">
                <img class="dateIcon" src="{$smarty.const.SITE_DIR}images/main/dateIcon.png" alt="date" title="Дата" />
                {$post[0].day} {$post[0].month}
                <img class="dateIcon" src="{$smarty.const.SITE_DIR}images/main/markIcon.png" alt="date" title="Рубрики" />
                {$post[0].rubrics}
            </div>
        </div><!--postInfo-->
        <div class="postText">
            {$post[0].name}
        </div>
        {foreach from=$post item=passage}
            <div class="passageText">
                {$passage.passage_header}
            </div>
            <div class="fullsizeImg">
                <img class="bigImg" src="{$smarty.const.SITE_DIR}images/pictures/big/{$post[0].post_id}/{$passage.passage_id}.{$passage.passage_imgtype}" />
            </div>

            <div class="postText">
                {$passage.passage_text}
            </div>
        {/foreach}
    </div><!--post-->
</div><!--maincontent-->
<div class="rightcontent">
    <div align="center"><h1>Lonty Рекоммендует</h1></div>
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
</div><!--rightcontent-->