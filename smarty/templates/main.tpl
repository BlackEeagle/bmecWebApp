{* Smarty *}

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{i18nLabel key="bmecWebApp.title"} - {block name="title"}{/block}</title>
        <meta name="description" content="BMEC WebApp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="css/bootstrap.css" />
       
        <style type="text/css">
            
            .sidebar-nav {
                padding: 9px 0;
            }
            
            body {
                padding-top: 60px;
            }
        </style>
        
        {block name="style"}{/block}
        
         <link rel="stylesheet" href="css/bootstrap-responsive.css" />
        
        {block name="head"}{/block}

        <link rel="shortcut icon" href="" />
    </head>

    <body>
        
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner" id="topNav">
                <div class="container-fluid">
                    <a class="brand" href="?">{i18nLabel key="bmecWebApp.title"}</a>

                     <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li data-nav-name="fzInventar"><a href="?cmd=1">{i18nLabel key="fzInventar.topNavigation"}</a></li>
                        </ul>
                        
                        {include file="includes/topNaviUserDropDown.tpl"}
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                   {block name="sidebarNav"}{/block}
                </div><!--/span-->
                <div class="span9">
                    {include file="includes/guiMessage/guiMessages.tpl"}
                    {block name="mainContent"}{/block}
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; <a href="http://www.bmec.ch" target="_blank">{i18nLabel key="bmecWebApp.bmec"}</a> 2012</p>
            </footer>

        </div><!--/.fluid-container-->

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript">
        
        $(function() {
            // Navigation
            var mainLevel = "{$navBean->getMainLevel()}";
            
            if(mainLevel !== "") {
                $("#topNav ul.nav li").each(function() {
                    var navName = $(this).data("nav-name");
                    if(navName != undefined && navName === mainLevel) {
                        $(this).addClass("active");
                        return false;
                    }
                });
            }
            
            // Validation-Error
            if(typeof validationErrorFieldNames !== "undefined") {
                for(var i = 0; i < validationErrorFieldNames.length; i++) {
                    var fieldName  = validationErrorFieldNames[i];

                    $("input[name='" + fieldName + "']").closest(".control-group").addClass("warning");
                }
            }
        });
        
        </script>
        {if $guiMsgHandler->hasGuiMessageOfType("fieldValidationError")}
            <script type="text/javascript">
                var validationErrorFieldNames = [ "{$guiMsgHandler->getFieldValidationErrorFieldNamesConcat()}" ];
            </script>
        {/if}
        {block name="script"}{/block}
    </body>
</html>