<?php

/**
 * MultiCasePropertiesTask.php
 *
 * @category mage2-code-generator
 * @copyright Copyright (c) 2016 Staempfli AG (http://www.staempfli.com)
 * @author    juan.alonso@staempfli.com
 */

require_once 'phing/Task.php';

class MultiCasePropertiesTask extends Task
{

    public function main()
    {
        $this->log('Setting Multicase Properties');
        foreach ($this->project->getUserProperties() as $property => $value) {
            // Skip phing built-in properties
            if (false !== strpos($property, 'phing')) {
                continue;
            }
            $propertyUcFirst = ucfirst($property);
            $valueUcFirst = ucfirst($value);
            $this->_setProperty($propertyUcFirst, $valueUcFirst);
            $propertyLcFirst = lcfirst($property);
            $valueLcFirst = lcfirst($value);
            $this->_setProperty($propertyLcFirst, $valueLcFirst);
        }
    }

    protected function _setProperty($property, $value)
    {
        $this->project->setUserProperty($property, $value);
        //$this->log($property . ' = ' . $value);
    }
}