{* Smarty *}

{extends file="main.tpl"}

{block name="sidebarNav"}
{include file="fahrzeugInventar/navigation.tpl"}
{/block}

{block name="title"}Fahrzeug-Inventar{/block}

{block name="script"}
<script type="text/javascript" src="js/fahrzeugInventar.js"></script>
<script type="text/javascript">
    $(function() {
        fzInventar.handleSidebarNav("{$navBean->getSubLevel()}");
    });
</script>
{/block}