<?php
namespace tranduchieu\FileMaker\Command;
/**
 * FileMaker API for PHP
 *
 * @package FileMaker
 *
 * Copyright © 2005-2007, FileMaker, Inc. All rights reserved.
 * NOTE: Use of this source code is subject to the terms of the FileMaker
 * Software License which accompanies the code. Your use of this source code
 * signifies your agreement to such license terms and conditions. Except as
 * expressly granted in the Software License, no other copyright, patent, or
 * other intellectual property license or right is granted, either expressly or
 * by implication, by FileMaker.
 */


/**
 * Command class that finds one random record.
 * Create this command with {@link FileMaker::newFindAnyCommand()}.
 *
 * @package FileMaker
 */
class FindAny extends Find
{

    /**
     * FindAny command constructor.
     *
     * @ignore
     * @param \tranduchieu\FileMaker\FileMaker $fm FileMaker object the command was created by.
     * @param string $layout Layout name to find a random record from.
     */
    function __construct($fm, $layout)
    {
        parent::__construct($fm, $layout);
    }
    
    /**
     * 
     * @return Result
     */
    public function execute() {
        $params = $this->_getCommandParams();
        $params['-findany'] = true;
        $result = $this->fm->execute($params);
        return $this->_getResult($result);
    }

}
