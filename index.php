<?php
// Default definitions.
define('ICON_TYPE_FOLDER', 'folder');
define('ICON_TYPE_FILE', 'file');
define('ICON_TYPE_SOCIAL', 'social');
define('ICON_TYPE_IMAGE', 'image');
define('ICON_TYPE_HOME', 'home');
define('ICON_TYPE_PARENT', 'parent');
define('ICON_TYPE_BACK', 'back');
define('ICON_TYPE_ALERT', 'alert');
define('ICON_TYPE_TRASH', 'trash');
define('ICON_TYPE_GOUP', 'goup');
define('ICON_TYPE_WATCH', 'watch');
define('ICON_TYPE_DOWNLOAD', 'download');
define('ICON_TYPE_COG', 'cog');

class Icon {
    private string $_type;
    private array $_icons = [
        ICON_TYPE_FOLDER => 'fa-solid fa-folder',
        ICON_TYPE_FILE => 'fa-solid fa-file',
        ICON_TYPE_SOCIAL => 'fa-brands fa-github-alt',
        ICON_TYPE_IMAGE => 'fa-solid fa-file-image',
        ICON_TYPE_HOME => 'fa-solid fa-house',
        ICON_TYPE_PARENT => 'fa-solid fa-turn-up fa-flip-horizontal',
        ICON_TYPE_BACK => 'fa-solid fa-arrow-left',
        ICON_TYPE_ALERT => 'fa-solid fa-triangle-exclamation',
        ICON_TYPE_TRASH => 'fa-solid fa-trash-can',
        ICON_TYPE_GOUP => 'fa-solid fa-circle-up',
        ICON_TYPE_WATCH => 'fa-solid fa-eye',
        ICON_TYPE_DOWNLOAD => 'fa-solid fa-download',
        ICON_TYPE_COG => 'fa-solid fa-gear',
    ];

    public function __construct(string $type)
    {
        $this->setType($type);
    }

    public function setType(string $type) {
        $this->_type = $type;
    }

    public function getType() {
        return $this->_type;
    }

    private function getImage(): string
    {
        return $this->_icons[$this->getType()];
    }

    public function draw(bool $return=false)
    {
        $output = $this->getImage();

        if ($return === true) {
            return $output;
        } else {
            echo $output;
        }
    }
}

class Line {

    private string $line;

    public function __construct(string $file, string $path, Icon $icon)
    {

        $formId = 'form_'.$file;

        if ($file === '..') {
            $newPath = parentDirectory($path);
        } else {
            $newPath = $path.'\\'.$file;
        }

        $this->line = '<a class="panel-block" onClick="document.getElementById(\''.$formId.'\').submit();">';
        $this->line .= '<span class="panel-icon"><i class="'.$icon->draw(true).'"></i></span>';
        $this->line .= $file;
        $this->line .= '</a>';
        $this->line .= '<form id="'.$formId.'" method="POST" action="#">';
        $this->line .= '<input type="hidden" name="newPath" value="'.$newPath.'"/>';
        $this->line .= '</form>';
    }

    public function draw()
    {
        return $this->line;
    }

}

// Auxiliar functions.
function parentDirectory(string $actualDirectory): string {
    $tmpPath = explode('\\', $actualDirectory);
    unset($tmpPath[count($tmpPath)-1]);
    return implode('\\', $tmpPath);
}

function messageToast(string $type, string $message) {

}

function filelist(string $actualPath=__DIR__) {

    try {
        if ($folderHandler = opendir($actualPath)) {
            //$output = '<ul class="fileList">';
            $output = '';
            while (false !== ($file = readdir($folderHandler))) {
                // Don't show this information.
                if ($file === '.' || $file === '..') {
                    continue;
                }
                // Check if this is a file or folder (for behavior).
                if (is_file($actualPath.'\\'.$file) === false) {
                    $icon = ICON_TYPE_FOLDER;
                } else {
                    $icon = ICON_TYPE_FILE;
                }

                $line = new Line($file, $actualPath, new Icon($icon));
                $output .= $line->draw();
            }
            //$output .= '</ul>';
            closedir($folderHandler);
        }

        return $output;
    } catch (Exception $ex) {
        var_dump($ex->getMessage());
    }
}

$basePath = __DIR__;
$actualDirectory= $_POST['newPath'] ?? $basePath;

// Header creation.
$iconGoHome = new Icon(ICON_TYPE_HOME);
$iconGoParent = new Icon(ICON_TYPE_PARENT);

$goHomeLink = '<i onClick="document.getElementById(\'goHomeForm\').submit();" class="selectable '.$iconGoHome->draw(true).'"></i>';
$goHomeLink .= '<form id="goHomeForm" method="POST" action="#">';
$goHomeLink .= '<input type="hidden" name="newPath" value="'.$basePath.'" />';
$goHomeLink .= '</form>';

$goParentLink = '<i onClick="document.getElementById(\'goParentForm\').submit();" class="selectable '.$iconGoParent->draw(true).'"></i>';
$goParentLink .= '<form id="goParentForm" method="POST" action="#">';
$goParentLink .= '<input type="hidden" name="newPath" value="'.parentDirectory($actualDirectory).'" />';
$goParentLink .= '</form>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(<?php echo $actualDirectory; ?>) - MyOwnCommander 0.1</title>
    <script src="https://kit.fontawesome.com/3f787ec5e9.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');
        @import "https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css";

        * {
            font-family: "Roboto", sans-serif;
        }

        body {
            margin: 0 1em;
        }

        .panel-heading i {
            padding: 0 0.2em;
            width: 32px;
            align-self: center;
            cursor: pointer;
        }

        i.selectable {
            cursor: pointer;
        }

        .panel-heading {
            display:flex;
        }

        header {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
            height: 32px;
            display: flex;
            align-items: center;
            margin: 1em 0;
        }

        header > div {
            padding: 5px;
        }

        div.itemLine {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        div.itemLine svg {
            height: 64px;
        }

        span.itemCaption {
            font-size: 18pt;
        }

        ul.fileList {
            list-style: none;
            padding-left: 1em;
        }

        ul.fileList .itemLine svg {
            margin-right: 1em;
        }
    </style>
</head>
<body>
<nav class="panel">
  <div class="panel-heading">
    <?php echo $goHomeLink; ?>
    <?php echo $goParentLink; ?>
    <?php echo $actualDirectory; ?>
    </div>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input" type="text" placeholder="Buscar...">
      <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>
  <?php echo filelist($actualDirectory); ?>
</nav>





</body>
</html>