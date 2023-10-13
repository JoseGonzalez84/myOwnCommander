<?php
namespace myOwnCommander\Source;

use myOwnCommander\Source\Functions;
use myOwnCommander\Source\Icon;

/**
 * Class Line.
 */
class Line
{

    private string $_line;

    /**
     * Constructor.
     *
     * @param string $file File.
     * @param string $path Path of the file.
     * @param string $type Type of line.
     */
    public function __construct(string $file, string $path, string $type)
    {

        $formId = 'form_'.$file;
        $icon = new Icon($type);

        if ($type === ICON_TYPE_FOLDER) {
            $hiddenName = 'newPath';
            $hiddenValue = $path.'\\'.$file;
        } else {
            $hiddenName = 'openFile';
            $hiddenValue = json_encode(
                [
                    'fileName' => $file,
                    'filePath' => $path
                ]
            );
        }


        $this->_line = '<a class="panel-block">';
        $this->_line .= '<div class="panel-icon-name">';
        $this->_line .= '<span class="panel-icon"><i class="'.$icon->draw(true).'"></i></span>';
        $this->_line .= '<span class="panel-icon" onClick="document.getElementById(\''.$formId.'\').submit();">'.$file.'</span>';
        $this->_line .= '</div>';
        $this->_line .= '<div class="panel-action-buttons">';
        $this->_line .= '<span class="panel-icon"><i class="fa-solid fa-eye"></i></span>';
        $this->_line .= '<span class="panel-icon"><i class="fa-solid fa-trash"></i></span>';
        $this->_line .= '</div>';
        $this->_line .= '</a>';
        $this->_line .= '<form id="'.$formId.'" method="POST" action="#">';
        $this->_line .= '<input type=\'hidden\' name=\''.$hiddenName.'\' value=\''.$hiddenValue.'\'/>';
        $this->_line .= '</form>';
    }

    /**
     * Return the icon drawed.
     *
     * @return string.
     */
    public function draw()
    {
        return $this->_line;
    }

}