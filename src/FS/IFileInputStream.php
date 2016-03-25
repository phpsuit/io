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
 * File Input Stream Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IFileInputStream extends IFS, IFileStream
{
    /**
     * Opens file to read in "r" mode.
     * Place the file pointer to the beginning of the file.
     *
     * @return void
     *
     * @throws HandlerExistsException
     * @throws OpenFileException
     * @throws FileNotReadableException
     */
    public function open();

    /**
     * Reads file "line by line".
     * Raise exception on the end of the file.
     *
     * @return string
     *
     * @throws EndFileException
     * @throws HandlerExistsException
     * @throws HandlerNotExistsException
     * @throws OpenFileException
     * @throws ReadFileException
     */
    public function read() : string;
}