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
* File System Path Interface.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
interface IPath
{
    /**
     * Returns IO\FS path.
     *
     * @return string
     */
    public function getPath() : string;

    /**
     * Sets IO\FS path.
     *
     * @param string $path IO\FS path.
     *
     * @return void
     */
    public function setPath(string $path);

    /**
     * Joins specified path to exists.
     *
     * @param string $path Path to be joined.
     *
     * @return void
     */
    public function joinPath(string $path);

    /**
     * Returns whether path has been set up.
     *
     * @return bool
     */
    public function hasPath() : bool;

    /**
     * Checks whether a entity exists in set path.
     *
     * @return boolean
     */
    public function isExists() : bool;
}