<?php

function parentDirectory(string $actualDirectory): string {
    $tmpPath = explode('\\', $actualDirectory);
    unset($tmpPath[count($tmpPath)-1]);
    return implode('\\', $tmpPath);
}

class Icon {
    private string $_image;
    private string $_type;

    public function __construct()
    {
    }

    public function setType(string $type) {
        $this->_type = $type;
    }

    public function getType() {
        return $this->_type;
    }

    protected function setImage(string $image): void
    {
        $this->_image = $image;
    }

    private function getImage(): string
    {
        return $this->_image;
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

class FolderIcon extends Icon {
    
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>'
        );
        parent::setType('folder');
    }


}

class ImageIcon extends Icon {
    
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="100px" height="100px"><path fill="#fefdef" d="M83.575,29.555C75.7,21.68,71.202,17.182,63.327,9.307H44.513h-9.105h-2.833h-1.268c-4.803,0-8.732,3.93-8.732,8.732v61.535c0,4.803,3.93,8.732,8.732,8.732h43.535c4.803,0,8.732-3.93,8.732-8.732V29.555z"/><path fill="#1f212b" d="M74.842,89.307H31.307c-5.366,0-9.732-4.366-9.732-9.732V18.04c0-5.367,4.366-9.732,9.732-9.732h32.021c0.266,0,0.52,0.105,0.707,0.293l20.247,20.248c0.188,0.188,0.293,0.442,0.293,0.707v50.02C84.575,84.941,80.209,89.307,74.842,89.307z M31.307,10.307c-4.264,0-7.732,3.469-7.732,7.732v61.535c0,4.264,3.469,7.732,7.732,7.732h43.535c4.264,0,7.732-3.469,7.732-7.732V29.969L62.914,10.307H31.307z"/><path fill="#fef6aa" d="M63.075,9.807v10.986c0,4.958,4.056,9.014,9.014,9.014h11.986"/><path fill="#1f212b" d="M84.075 30.307H72.089c-5.246 0-9.515-4.268-9.515-9.515V9.807c0-.276.224-.5.5-.5s.5.224.5.5v10.985c0 4.695 3.819 8.515 8.515 8.515h11.985c.276 0 .5.224.5.5S84.351 30.307 84.075 30.307zM78.075 48.307c-.276 0-.5-.224-.5-.5v-3c0-.276.224-.5.5-.5s.5.224.5.5v3C78.575 48.083 78.351 48.307 78.075 48.307zM78.075 56.307c-.276 0-.5-.224-.5-.5v-6c0-.276.224-.5.5-.5s.5.224.5.5v6C78.575 56.083 78.351 56.307 78.075 56.307zM70.917 83.307H35.233c-4.223 0-7.658-3.45-7.658-7.689V22.955c0-2.458 1.193-4.79 3.193-6.238 1.31-.949 2.854-1.451 4.465-1.451.276 0 .5.224.5.5s-.224.5-.5.5c-1.398 0-2.74.436-3.879 1.261-1.74 1.262-2.779 3.291-2.779 5.429v52.663c0 3.688 2.987 6.689 6.658 6.689h35.684c3.671 0 6.658-3.001 6.658-6.689V57.807c0-.276.224-.5.5-.5s.5.224.5.5v17.811C78.575 79.857 75.139 83.307 70.917 83.307z"/><path fill="#b3e1e6" d="M69.141,76.807H38.008c-2.163,0-3.933-1.77-3.933-3.933V40.741c0-2.163,1.77-3.933,3.933-3.933h31.133c2.163,0,3.933,1.77,3.933,3.933v32.133C73.075,75.037,71.305,76.807,69.141,76.807z"/><path fill="#1f212b" d="M69.141,77.307H38.008c-2.444,0-4.434-1.989-4.434-4.434V40.741c0-2.445,1.989-4.434,4.434-4.434h31.133c2.444,0,4.434,1.989,4.434,4.434v32.133C73.575,75.318,71.586,77.307,69.141,77.307z M38.008,37.307c-1.894,0-3.434,1.541-3.434,3.434v32.133c0,1.893,1.54,3.434,3.434,3.434h31.133c1.894,0,3.434-1.541,3.434-3.434V40.741c0-1.893-1.54-3.434-3.434-3.434H38.008z"/><path fill="#f9e65c" d="M45.575 39.807A5.5 5.5 0 1 0 45.575 50.807A5.5 5.5 0 1 0 45.575 39.807Z"/><path fill="#1f212b" d="M45.575,51.307c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S48.883,51.307,45.575,51.307z M45.575,40.307c-2.757,0-5,2.243-5,5s2.243,5,5,5s5-2.243,5-5S48.332,40.307,45.575,40.307z"/><path fill="#00a7a7" d="M34.075,67.335l9.329-10.547l7.546,10.41l-6.124,9.61l-7.235-0.081c0,0-3.516-0.593-3.516-3.998C34.075,69.323,34.075,67.335,34.075,67.335z"/><path fill="#1f212b" d="M44.826,77.308c-0.002,0-0.004,0-0.006,0l-7.235-0.081c-1.438-0.236-4.01-1.47-4.01-4.498v-5.395c0-0.122,0.045-0.24,0.126-0.331l9.329-10.546c0.1-0.114,0.242-0.184,0.398-0.168c0.151,0.007,0.291,0.083,0.381,0.206l7.546,10.41c0.12,0.166,0.127,0.389,0.017,0.562l-6.124,9.61C45.156,77.221,44.997,77.308,44.826,77.308z M34.575,67.524v5.205c0,2.949,2.973,3.484,3.099,3.505l6.88,0.071l5.792-9.089l-6.98-9.629L34.575,67.524z"/><path fill="#00a7a7" d="M72.951,64.057l-9.938-14.676L44.889,76.807h24.253c2.163,0,3.933-1.77,3.933-3.933v-8.8L72.951,64.057z"/><path fill="#1f212b" d="M69.141,77.307H44.888c-0.184,0-0.354-0.101-0.44-0.263s-0.078-0.359,0.023-0.513l18.124-27.426c0.093-0.14,0.291-0.211,0.417-0.224c0.166,0,0.321,0.082,0.414,0.22l9.822,14.505c0.192,0.071,0.326,0.256,0.326,0.469v8.799C73.575,75.318,71.586,77.307,69.141,77.307z M45.818,76.307h23.323c1.894,0,3.434-1.541,3.434-3.434v-8.487c-0.014-0.016-0.026-0.032-0.038-0.049l-9.52-14.057L45.818,76.307z"/></svg>'
        );
        parent::setType('file');
    }

}

class DocumentIcon extends Icon {
    
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>'
        );
        parent::setType('file');
    }

}

class SocialIcon extends Icon {
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>'
        );
        parent::setType('file');
    }
}

class HomeIcon extends Icon {
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'
        );
        parent::setType('button');
    }
}

class ParentIcon extends Icon {
    public function __construct(bool $draw=false)
    {
        parent::setImage(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>'
        );
        parent::setType('button');
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

        $this->line = '<li>';
        $this->line .= '<form id="'.$formId.'" method="POST" action="#">';
        $this->line .= '<input type="hidden" name="newPath" value="'.$newPath.'"/>';
        $this->line .= '<div class="itemLine" onClick="document.getElementById(\''.$formId.'\').submit();">';
        $this->line .= $icon->draw(true);
        $this->line .= "<span class=\"itemCaption\">{$file}</span>";
        $this->line .= '</div>';
        $this->line .= '</form>';
        $this->line .= '</li>';
    }

    public function draw()
    {
        return $this->line;
    }

}

function messageToast(string $type, string $message) {

}

function filelist(string $actualPath=__DIR__) {
    try {
        if ($folderHandler = opendir($actualPath)) {
            $output = "<ul style='list-style: none'>";
            while (false !== ($file = readdir($folderHandler))) {
                if (is_file($actualPath.'\\'.$file) === false) {
                    $icon = new FolderIcon();
                } else {
                    $icon = new DocumentIcon();
                }
        
                $lineaPrueba = new Line($file, $actualPath, $icon);
        
                $output .= $lineaPrueba->draw();
            }
            $output .= "</ul>";
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
$iconGoHome = new HomeIcon();
$iconGoParent = new ParentIcon();

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