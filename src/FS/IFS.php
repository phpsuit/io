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

use PS\IO\IIO;

/**
* File System Interface.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
interface IFS extends IIO, IPath, IPermissions, IRemovable, ILink
{
    /**
     * Create new FS object.
     * Sets path.
     *
     * @param string $path entity path.
     */
    public function __construct(string $path = '');

    /**
     * Tells whether the entity path is a regular file.
     *
     * @return boolean
     */
    public function isFile() : bool;

    /**
     * Tells whether the io path is a directory.
     *
     * @return boolean
     */
    public function isDir() : bool;

    /**
     * Return name of entity path.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Return dir of the FS entity.
     *
     * @return Dir
     */
    public function getDir() : Dir;
}