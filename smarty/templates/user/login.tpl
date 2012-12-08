{* Smarty *}

{extends file="main.tpl"}

{block name="title"}{i18nLabel key="bmecWebApp.login.title"}{/block}

{block name="mainContent"}
<fieldset>
    <legend>{i18nLabel key="bmecWebApp.login.title"}</legend>
    <form class="form-horizontal" action="?cmd=3" method="post">
        <div class="control-group">
            <label class="control-label" for="inputUsername">{i18nLabel key="bmecWebApp.login.username"}</label>
            <div class="controls">
                <input type="text" id="inputUsername" name="username" placeholder="{i18nLabel key="bmecWebApp.login.username"}" value="{$username}" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">{i18nLabel key="bmecWebApp.login.password"}</label>
            <div class="controls">
                <input type="password" id="inputPassword" name="password" placeholder="{i18nLabel key="bmecWebApp.login.password"}" />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">{i18nLabel key="bmecWebApp.login.button"}</button>
            </div>
        </div>
    </form>
</fieldset>
{/block}