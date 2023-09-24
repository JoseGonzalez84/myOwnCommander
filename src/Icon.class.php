<?php

namespace myOwnCommander\Source;
// Definitions by default.
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
define('ICON_TYPE_LOCATION', 'location"></i>');
/**
 * Clase Icon
 */
class Icon
{
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
        ICON_TYPE_LOCATION => 'fa-solid fa-location-arrow',
    ];

    /**
     * Constructor.
     *
     * @param string $type Type of icon.
     */
    public function __construct(string $type)
    {
        $this->setType($type);
    }

    /**
     * Set Type.
     *
     * @param string $type Type.
     *
     * @return void.
     */
    public function setType(string $type)
    {
        $this->_type = $type;
    }

    /**
     * Get Type.
     *
     * @return string.
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * Get Image.
     *
     * @return string.
     */
    private function _getImage(): string
    {
        return $this->_icons[$this->getType()];
    }

    /**
     * Draw the icon.
     *
     * @param boolean $return False by default.
     *
     * @return void|string.
     */
    public function draw(bool $return=false)
    {
        $output = $this->_getImage();

        if ($return === true) {
            return $output;
        } else {
            echo $output;
        }
    }
}