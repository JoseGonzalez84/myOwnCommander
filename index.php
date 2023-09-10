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
        ICON_TYPE_FOLDER => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>',
        ICON_TYPE_FILE => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
        ICON_TYPE_SOCIAL => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>',
        ICON_TYPE_IMAGE => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>',
        ICON_TYPE_HOME => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
        ICON_TYPE_PARENT => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>',
        ICON_TYPE_BACK => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        ICON_TYPE_ALERT => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
        ICON_TYPE_TRASH => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>',
        ICON_TYPE_GOUP => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg>',
        ICON_TYPE_WATCH => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
        ICON_TYPE_DOWNLOAD => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>',
        ICON_TYPE_COG => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
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

        $this->line = '<form id="'.$formId.'" method="POST" action="#">';
        $this->line .= '<input type="hidden" name="newPath" value="'.$newPath.'"/>';
        $this->line .= '<div class="itemLine" onClick="document.getElementById(\''.$formId.'\').submit();">';
        $this->line .= $icon->draw(true);
        $this->line .= "<span class=\"itemCaption\">{$file}</span>";
        $this->line .= '</div>';
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
            $output = '<ul style="list-style: none">';
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
        
                $output .= '<li>'.$line->draw().'</li>';
            }
            $output .= '</ul>';
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

$goHomeLink = '<form id="goHomeForm" method="POST" action="#">';
$goHomeLink .= '<input type="hidden" name="newPath" value="'.$basePath.'" />';
$goHomeLink .= '<div class="itemLine" onClick="document.getElementById(\'goHomeForm\').submit();">';
$goHomeLink .= $iconGoHome->draw(true);
$goHomeLink .= '</div>';
$goHomeLink .= '</form>';

$goParentLink = '<form id="goParentForm" method="POST" action="#">';
$goParentLink .= '<input type="hidden" name="newPath" value="'.parentDirectory($actualDirectory).'" />';
$goParentLink .= '<div class="itemLine" onClick="document.getElementById(\'goParentForm\').submit();">';
$goParentLink .= $iconGoParent->draw(true);
$goParentLink .= '</div>';
$goParentLink .= '</form>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(<?php echo $actualDirectory; ?>) - MyOwnCommander 0.1</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');

        * {
            font-family: "Roboto", sans-serif;
        }

        body {
            margin: 0 1em;
        }

        header {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
            height: 32px;
            display: flex;
            align-items: center;
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
    </style>
</head>
<body>
<header>
    <?php echo $goHomeLink; ?>
    <?php echo $goParentLink; ?>
    <span><?php echo $actualDirectory; ?></span>
</header>
<?php echo filelist($actualDirectory); ?>
</body>
</html>