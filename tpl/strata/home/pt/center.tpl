{include file="home/{$smarty.const.LNG}/centerheader.tpl"}
<section id="two">
{if (isset($page_content))}
    {$page_content}
{else}
    {include file="home/{$smarty.const.LNG}/centercontent.tpl"}
{/if}
</section>
{include file="home/{$smarty.const.LNG}/centerfooter.tpl"}
