<div class="passageText editable" action="passages" key="{$passage.passage_id}" data-type="textarea" name="passages[passage_header]">
    {$passage.passage_header}
</div>
<div class="fullsizeImg">
    <img class="bigImg editable" data-type="img" superkey="{$passage.post_id}" img-type="{$passage.passage_imgtype}" key="{$passage.passage_id}" src="{$smarty.const.SITE_DIR}images/pictures/big/{$passage.post_id}/{$passage.passage_id}.{$passage.passage_imgtype}?{$temp}" />
</div>
<div class="passageText editable" action="passages" key="{$passage.passage_id}" data-type="textarea" name="passages[passage_text]">
    {if $passage.passage_text}{$passage.passage_text}{else}<b class="btn small">добавить текст</b>{/if}
</div>
<div class="passage">
    <div class="button addPassage">Дабавить абзац</div>
</div>