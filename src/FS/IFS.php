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
interface IFS extends IIO, IPath, IPermissions, IRemovable
{
    /**
     * Create new entity object.
     * Sets path.
     *
     * @param string $path entity path.
     */
    public function __construct(string $path = '');

    /**
     * Checks whether a entity exists in set path.
     *
     * @return boolean
     */
    public function isExists() : bool;

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

    /**
     * Tells whether the entity path is a symbolic link.
     *
     * @return boolean
     */
    public function isLink() : bool;

    /**
     * Returns the target of a symbolic link.
     *
     * @return string
     */
    public function readlink() : string;

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
     * Return dir of entity.
     *
     * @return PS\entity\Dir
     */
    public function getDir() : PS\entity\Dir;
}