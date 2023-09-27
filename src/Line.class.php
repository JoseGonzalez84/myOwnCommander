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
     * @param Icon   $icon Icon for show.
     */
    public function __construct(string $file, string $path, Icon $icon)
    {

        $formId = 'form_'.$file;

        if ($file === '..') {
            $newPath = Functions::parentDirectory($path);
        } else {
            $newPath = $path.'\\'.$file;
        }

        $this->_line = '<a class="panel-block" onClick="document.getElementById(\''.$formId.'\').submit();">';
        $this->_line .= '<span class="panel-icon"><i class="'.$icon->draw(true).'"></i></span>';
        $this->_line .= $file;
        $this->_line .= '</a>';
        $this->_line .= '<form id="'.$formId.'" method="POST" action="#">';
        $this->_line .= '<input type="hidden" name="newPath" value="'.$newPath.'"/>';
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