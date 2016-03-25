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
 * File Stream Handler Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IFileStreamHandler
{
    /**
     * Returns file pointer.
     *
     * @return resource
     *
     * @throws HandlerNotExistsException
     */
    public function getHandler() : resource;

    /**
     * Sets file pointer.
     *
     * @param resource $handler File pointer.
     * 
     * @return void
     * 
     * @throws HandlerExistsException
     */
    public function setHandler(resource $handler);

    /**
     * Checks whether handler exists.
     *
     * @return bool
     */
    public function hasHandler() : bool ;
}