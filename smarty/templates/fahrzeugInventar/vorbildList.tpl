{* Smarty *}

{extends file="fahrzeugInventar/base.tpl"}

{block name="mainContent"}
<fieldset>
    <legend>{i18nLabel key="fzInventar.vorbild.alleVorbilder"}</legend>
    <table class="table">
        <thead>
            <tr>
                <th>{i18nLabel key="fzInventar.vorbild.typ"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.serie"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.evu"}</th>
                <th>{i18nLabel key="fzInventar.vorbild.epoche"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach $vorbilder as $vorbild}
                <tr>
                    <td>{$vorbild->getTyp()}</td>
                    <td>{$vorbild->getSerie()}</td>
                    <td>{$vorbild->getEvuId()}</td>
                    <td>{$vorbild->getEpocheId()}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</fieldset>
{/block}