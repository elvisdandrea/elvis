<div class="table-wrapper">
    <table id="{$id}">
        <thead>
        {if (!isset($showTitles) || (isset($showTitles) && $showTitles)) }
            {foreach from=$head key="title" item="field"}
                <th id="{$id}_{$field}">{$title}</th>
            {/foreach}
        {/if}
        </thead>
        <tbody>
            {foreach from=$content key="index" item="row"}
                <tr id="{$id}_{$index}">
                    {foreach from=$head key="title" item="field"}
                        <td id="{$id}_{$index}_{$field}">{$row[$field]}</td>
                    {/foreach}
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>