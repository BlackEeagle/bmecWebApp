{* Smarty *}

{extends file="main.tpl"}

{block name="sidebarNav"}
{include file="fahrzeugInventar/navigation.tpl"}
{/block}

{block name="title"}{i18nLabel key="fzInventar.topNavigation"}{/block}

{block name="script"}
<script type="text/javascript" src="js/fahrzeugInventar.js"></script>
<script type="text/javascript">
    $(function() {
        fzInventar.handleSidebarNav("{$navBean->getSubLevel()}");
    });
</script>
{/block}