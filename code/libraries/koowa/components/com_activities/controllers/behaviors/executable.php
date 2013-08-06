<?php
/**
 * @package     Nooku_Server
 * @subpackage  Activities
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Executable Controller Behavior
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @package     Nooku_Server
 * @subpackage  Activities
 */
class ComActivitiesControllerBehaviorExecutable extends ComKoowaControllerBehaviorExecutable
{
    public function canAdd()
    {
        $result = false;
        if (!$this->_mixer->isDispacthed()) {
            $result = true;
        }
        return $result;
    }

    public function canEdit()
    {
        return false;
    }
}