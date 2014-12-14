<div class="table-wrapper">
    <table id="{$id}">
        <thead>
            {foreach from=$head key="th" item="title"}
                <th id="{$id}_{$th}">{$title}</th>
            {/foreach}
        </thead>
        <tbody>
            {foreach from=$content key="index" item="row"}
                <tr id="{$id}_{$index}">
                    {foreach from=$row key="field" item="value"}
                        <td id="{$id}_{$index}_{$field}">{$value}</td>
                    {/foreach}
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>