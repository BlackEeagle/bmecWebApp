{* Smarty *}

{extends file="fahrzeugInventar/base.tpl"}

{block name="mainContent"}
<fieldset>
    <legend>{i18nLabel key="fzInventar.vorbild.alleVorbilder"}</legend>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{i18nLabel key="fzInventar.vorbild.typ"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.serie"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.evu"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.epoche"}</th>
            </tr>
        </thead>
        <tbody id="vorbildRows">
            {foreach $vorbilder as $vorbild}
                <tr data-id="{$vorbild->getId()}">
                    <td>{$vorbild->getTyp()}</td>
                    <td>{$vorbild->getSerie()}</td>
                    <td>{$evuMap[$vorbild->getEvuId()]->getName()}</td>
                    <td>{$epochenMap[$vorbild->getEpocheId()]->getName()}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</fieldset>
{/block}

{block name="script" append}
<script type="text/javascript">
    $("#vorbildRows tr").click(function() {
        location.href = "?cmd=8&id=" + $(this).data("id");
    });
</script>
{/block}