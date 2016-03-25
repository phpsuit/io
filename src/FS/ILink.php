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
* File System Link Interface.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
interface ILink
{
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
     *
     * @throws NotLinkException
     */
    public function readLink() : string;

    /**
     * Creates symlink to the existing path with specified name link.
     *
     * @param IPath $link Symlink path.
     *
     * @return bool
     */
    public function symLink(IPath $link) : bool ;

    /**
     * Creates hard link to the existing path with specified name link.
     *
     * @param IPath $link Link path.
     *
     * @return bool
     */
    public function link(IPath $link) : bool ;
}