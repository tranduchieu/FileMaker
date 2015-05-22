<?php
namespace tranduchieu\FileMaker\Object;
use tranduchieu\FileMaker\FileMaker;
use tranduchieu\FileMaker\FileMakerException;
/**
 * FileMaker API for PHP
 *
 * @package FileMaker
 *
 * Copyright � 2005-2007, FileMaker, Inc. All rights reserved.
 * NOTE: Use of this source code is subject to the terms of the FileMaker
 * Software License which accompanies the code. Your use of this source code
 * signifies your agreement to such license terms and conditions. Except as
 * expressly granted in the Software License, no other copyright, patent, or
 * other intellectual property license or right is granted, either expressly or
 * by implication, by FileMaker.
 */

/**
 * @ignore Include delegate.
 */
//require_once dirname(__FILE__) . '/Implementation/RelatedSetImpl.php';


/**
 * Portal description class. Contains all the information about a
 * specific set of related records defined by a portal on a layout.
 *
 * @package FileMaker
 */
class RelatedSet
{
    /**
     *
     * @var FileMaker 
     */
    public $fm;
    /**
     *
     * @var Layout 
     */
    public $layout;
    public $name;
    
    public $fields;
    /**
     * Portal constructor.
     *
     * @param Layout &$layout Layout object that this 
     * portal is on.
     */
    public function __construct($layout)
    {
        $this->layout = $layout;
        $this->fm = $layout->fm;
    }

    /**
     * Returns the name of the related table from which this portal displays 
     * related records.
     *
     * @return string Name of related table for this portal.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns an array of the names of all fields in this portal.
     *
     * @return array List of field names as strings.
     */
    public function listFields()
    {
        return array_keys($this->fields);
    }

    /**
     * Returns a FileMaker_Field object that describes the specified field.
     *
     * @param string $fieldName Name of field.
     * 
     * @return FileMaker_Field Field object, if successful. 
     * @throws FileMakerException
     */
    public function getField($fieldName)
    {
        if (isset($this->fields[$fieldName])) {
            return $this->fields[$fieldName];
        }
        throw new FileMakerException($this->fm, 'Field Not Found');
    }

    /**
     * Returns an associative array with the names of all fields as keys and 
     * FileMaker_Field objects as the array values.
     *
     * @return array Array of {@link FileMaker_Field} objects.
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Loads extended (FMPXMLLAYOUT) layout information.
     *
     * @access private
     *
     * @return boolean TRUE, if successful.
     * @throws FileMakerException
     */
    public function loadExtendedInfo()
    {
        throw new FileMakerException($this->fm, 'Related sets do not support extended information.');
    }

}
