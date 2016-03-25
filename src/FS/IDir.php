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
 * Dir Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IDir extends IFS
{
    /**
     * Creates new directory if it does not exists and change permission mode to specified otherwise.
     *
     * @param int|null $mode      Permissions mode.
     * @param bool     $recursive Allows the creation of nested directories specified in the path.
     *
     * @return bool
     * 
     * @throws CreateDirException
     * @throws DirExistsException
     */
    public function create(int $mode = 0777, bool $recursive = true) : bool ;
}