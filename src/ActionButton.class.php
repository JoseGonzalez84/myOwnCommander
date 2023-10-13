<?php

namespace myOwnCommander\Source;

use myOwnCommander\Source\Icon;

use Exception;

/**
 * Auxiliary Functions class.
 */
class ActionButton
{
    public function __construct(
        private Icon $_icon,
        private string $_formName,
        private array $_inputs
    ) {

    }

    private function _makeInput(array $data)
    {
        return sprintf(
            '<input type="%s" name="%s" value="%s" />',
            $data['type'],
            $data['name'],
            $data['value'],
        );
    }

    public function draw()
    {
        $formName = $this->_formName.'Form';
        // Make the control.
        $output = sprintf(
            '<div onClick="document.getElementById(\'%s\').submit();" class="selectable %s"></div>',
            $formName,
            $this->_icon->draw(true)
        );

        $output .= sprintf(
            '<form id="%s" method="POST" action="#">',
            $formName
        );

        foreach ($this->_inputs as $input) {
            $output .= $this->_makeInput($input);
        }

        $output .= '</form>';

        echo $output;
    }
}
