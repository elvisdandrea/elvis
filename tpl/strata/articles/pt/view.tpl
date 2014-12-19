<h2>{$content['title']}</h2>
<div class="">
    <div style="height: auto; display: block; width: 13em; float: left;">
        <img height="160px" src="{$smarty.const.T_IMGURL}/{$content['image']}">
    </div>
    <div style="display: inline-block; width: 30em; margin-left: 2em; margin-top: 1em; text-align: center; float: right;">
        <small>{$content['description']}</small>
    </div>
    <div style="width: 100%; clear: left;">
        <hr/>
        {$content['html']}
    </div>
</div>
<a href="{$smarty.const.BASEDIR}articles/articlelist">Voltar</a>