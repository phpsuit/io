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
* Dir class.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Dir extends AFS implements IDir
{
    /**
     * Remove FS entity from file system.
     *
     * @return bool
     * 
     * @throws DirNotExistsException
     * @throws NotDirException
     * @throws RemoveDirException
     */
    public function remove() : bool
    {
        if (!$this->isExists()) {
            throw new DirNotExistsException('File not exists.');
        }

        if (!$this->isDir()) {
            throw new NotDirException('The path is not a dir.');
        }

        if (rmdir($this->getPath()) === false) {
            throw new RemoveDirException('Can\'t remove dir.');
        }

        return true;
    }
}