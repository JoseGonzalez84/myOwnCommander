<?php

namespace myOwnCommander\Source;

class Visor
{
    private string $_visorContent = '';

    public function __construct(private string $_file='')
    {
        if (empty($this->_file) === false && is_file($this->_file) === true) {
            $this->_process();
        }
    }

    public function setFile(string $file)
    {
        $this->_file = $file;
        $this->_process();
    }

    private function _process()
    {
        $fileMime = mime_content_type($this->_file);
        if (strchr($fileMime, '/', true) === 'text') {
            $fileContent = file_get_contents($this->_file);
            $this->_visorContent = '<textarea name="fileVisor" id="fileVisor">'.$fileContent.'</textarea>';
        } else if (strchr($fileMime, '/', true) === 'text') {
            $fileContent = file_get_contents($this->_file);
            $this->_visorContent = '<textarea name="fileVisor" id="fileVisor">'.$fileContent.'</textarea>';
        } else {
            $fileContent = "Aun no se pueden abrir ficheros {$fileMime}";
            $this->_visorContent = '<textarea name="fileVisor" id="fileVisor">'.$fileContent.'</textarea>';
        }
    }

    public function hasContent()
    {
        return empty($this->_visorContent) === false;
    }

    public function draw()
    {
        return $this->_visorContent;
    }
}