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
                <tr id="{$id}_{$index}"
                    {if ($rowAction != '' && $rowFieldId != '')}
                        style="cursor: pointer;"
                        onclick="quickLink('{$rowAction}?{$rowFieldId}={$row[$rowFieldId]}')"
                        {/if}>
                    {foreach from=$head key="field" item="fieldparams"}
                    <td id="{$id}_{$index}_{$field}">

                        {if ($fieldparams['type'] == 'Text')}
                            {$row[$fieldparams['field']]}
                        {elseif ($fieldparams['type'] == 'Image')}
                            {if ($row[$fieldparams['field']] != '')}
                                <img width="120px" src="{$smarty.const.T_IMGURL}/{$row[$fieldparams['field']]}" />
                            {/if}
                        {/if}
                        {if ($fieldparams['subtitle'])}
                            <br><small style="font-weight: normal; font-size: 10px; line-height: 10px;">
                                {$row[$fieldparams['subtitle']]}
                            </small>
                        {/if}
                        </td>
                    {/foreach}
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>