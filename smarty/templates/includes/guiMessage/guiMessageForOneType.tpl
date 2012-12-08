{* Smarty *}
{if $guiMsgHandler->hasGuiMessageOfType($type)}
    <div class="alert {$alertCssClass}">
        {if $guiMsgHandler->countGuiMessageOfType($type) > 1}
            <ul>
                {foreach $guiMsgHandler->getGuiMessagesOfType($type) as $message}
                    <li>{i18nLabel key=$message->getMessageKey() }</li>
                {/foreach}
            </ul>
        {else}
            {foreach $guiMsgHandler->getGuiMessagesOfType($type) as $message}
                {i18nLabel key=$message->getMessageKey() }
            {/foreach}
        {/if}
    </div>
{/if}