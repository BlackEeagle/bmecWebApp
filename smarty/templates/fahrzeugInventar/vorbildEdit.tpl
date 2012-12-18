{* Smarty *}

{extends file="fahrzeugInventar/base.tpl"}

{block name="mainContent"}
<fieldset>
    <legend>{i18nLabel key="fzInventar.vorbild.title"}</legend>
    <form class="form-horizontal" action="?cmd=7" method="post">
        <inpu type="hidden" name="id" value="" />
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="selectEvu">{i18nLabel key="fzInventar.vorbild.evu"}</label>
                    <div class="controls">
                        {htmlSelect name="evu" id="selectEvu" list=$evuList}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="selectGattung">{i18nLabel key="fzInventar.vorbild.gattung"}</label>
                    <div class="controls">
                        {htmlSelect name="gattung" id="selectGattung" list=$gattungList}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="inputTyp">{i18nLabel key="fzInventar.vorbild.typ"}</label>
                    <div class="controls">
                        {htmlInputText id="inputTyp" placeholderKey="fzInventar.vorbild.typ" name="typ"}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="inputSerie">{i18nLabel key="fzInventar.vorbild.serie"}</label>
                    <div class="controls">
                        {htmlInputText id="inputSerie" placeholderKey="fzInventar.vorbild.serie" name="serie"}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="inputFarbe">{i18nLabel key="fzInventar.vorbild.farbe"}</label>
                    <div class="controls">
                        {htmlInputText id="inputFarbe" placeholderKey="fzInventar.vorbild.farbe" name="farbe"}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="inputGeschwindigkeit">{i18nLabel key="fzInventar.vorbild.geschwindigkeit"}</label>
                    <div class="controls">
                        {htmlInputText id="inputGeschwindigkeit" placeholderKey="fzInventar.vorbild.geschwindigkeit" name="geschwindigkeit"}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="inputAchsen">{i18nLabel key="fzInventar.vorbild.achsen"}</label>
                    <div class="controls">
                        {htmlInputText id="inputAchsen" placeholderKey="fzInventar.vorbild.achsen" name="achsen"}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="selectEpoche">{i18nLabel key="fzInventar.vorbild.epoche"}</label>
                    <div class="controls">
                        {htmlSelect name="epoche" id="selectEpoche" list=$epocheList}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">{i18nLabel key="bmecWebApp.button.speichern"}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</fieldset>
{/block}