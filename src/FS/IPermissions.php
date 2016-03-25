<?php
/**
* PHPSuit
*
* @category  PHPSuit
* @package   PHPSuit/IO
* @author    Oleg Bronzov <oleg.bronzov@gmail.com>
* @copyright 2016 PHPSuit
* @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

namespace PS\IO\FS;

/**
* File System Permissions Interface.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
interface IPermissions
{
    /**
     * Change IO\FS mode.
     *
     * @param integer $mode Permissions mode.
     *
     * @return boolean
     */
    public function chmod(int $mode) : bool;

    /**
     * Change IO\FS owner.
     *
     * @param string $user User name or user id.
     *
     * @return boolean
     */
    public function chown(string $user) : bool;

    /**
     * Change IO\FS group.
     *
     * @param string $group Group name or group id.
     *
     * @return boolean
     */
    public function chgrp(string $group) : bool;

    /**
     * Checks whether a entity writable.
     *
     * @return boolean
     */
    public function isWritable() : bool;

    /**
     * Checks whether a entity readable.
     *
     * @return boolean
     */
    public function isReadable() : bool;
}