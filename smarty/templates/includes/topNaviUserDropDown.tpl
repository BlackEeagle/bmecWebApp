<ul class="nav nav-pills pull-right">
    {if $security->isLoggedIn()}
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user icon-black"></i> {$security->getUser()->getName()}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="?cmd=4">{i18nLabel key="bmecWebApp.login.logout"}</a></li>
            </ul>
        </li>
    {else}
        <li data-nav-name="login"><a href="?cmd=2">{i18nLabel key="bmecWebApp.login.title"}</a></li>
    {/if}
</ul><!--/.btn-group -->