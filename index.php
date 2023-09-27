<?php
/**
 * 
 */
require 'src\Icon.class.php';
require 'src\Line.class.php';
require 'src\Functions.class.php';

use \myOwnCommander\Source\Icon;
use \myOwnCommander\Source\Line;
use \myOwnCommander\Source\Functions;

// Default definitions.
$basePath = __DIR__;
$actualDirectory= $_POST['newPath'] ?? $basePath;

// Header creation.
$iconGoHome = new Icon(ICON_TYPE_HOME);
$iconGoParent = new Icon(ICON_TYPE_PARENT);
$iconGoToPath = new Icon(ICON_TYPE_LOCATION);
$iconConfiguration = new Icon(ICON_TYPE_COG);

$goHomeLink = '<div onClick="document.getElementById(\'goHomeForm\').submit();" class="selectable '.$iconGoHome->draw(true).'"></div>';
$goHomeLink .= '<form id="goHomeForm" method="POST" action="#">';
$goHomeLink .= '<input type="hidden" name="newPath" value="'.$basePath.'" />';
$goHomeLink .= '</form>';

$goParentLink = '<div onClick="document.getElementById(\'goParentForm\').submit();" style="padding:0 0.5em;" class="selectable '.$iconGoParent->draw(true).'"></div>';
$goParentLink .= '<form id="goParentForm" method="POST" action="#">';
$goParentLink .= '<input type="hidden" name="newPath" value="'.Functions::parentDirectory($actualDirectory).'" />';
$goParentLink .= '</form>';

$goToPathLink = '<div onClick="document.getElementById(\'goToPath\').submit();" style="padding-right: 0.5em;" class="selectable '.$iconGoToPath->draw(true).'"></div>';
$goToPathLink .= '<form id="goToPath" method="POST" action="#">';
$goToPathLink .= '<input id="pathFile" type="text" value="'.$actualDirectory.'" />';
$goToPathLink .= '</form>';

$goConfigLink = '<div onClick="document.getElementById(\'goConfiguration\').submit();" class="selectable '.$iconConfiguration->draw(true).'"></div>';
$goConfigLink .= '<form id="goConfiguration" method="POST" action="#">';
$goConfigLink .= '<input type="hidden" name="configuration" value="1" />';
$goConfigLink .= '</form>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(<?php echo $actualDirectory; ?>) - MyOwnCommander 0.1</title>
    <script src="https://kit.fontawesome.com/3f787ec5e9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');
        @import "https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css";
        @import "resources/styles.css";
    </style>
</head>
<body>
    <nav class="panel">
    <div class="panel-heading">
        <?php echo $goHomeLink; ?>
        <?php echo $goParentLink; ?>
        <?php echo $goToPathLink; ?>
        <?php echo $goConfigLink; ?>
        </div>
    <div class="panel-block">
        <p class="control has-icons-left">
        <input class="input" type="text" placeholder="Buscar...">
        <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
        </p>
    </div>
    <div class="panel-ficheros">
        <div class="panel-lista">
        <?php echo Functions::filelist($actualDirectory); ?>
        </div>
        <div class="panel-visor">
            <div>
                <textarea name="fileVisor" id="fileVisor"></textarea>
            </div>
        </div>
    </div>
    </nav>
</body>
</html>