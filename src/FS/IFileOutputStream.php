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
 * File Output Stream Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IFileOutputStream extends IFS, IFileStream
{
    /**
     * Opens file to write.
     * Place the file pointer at the beginning of the file and truncate the file to zero length.
     * If the file does not exist, attempt to create it.
     *
     * @return void
     *
     * @throws HandlerExistsException
     * @throws OpenFileException
     * @throws FileNotWritableException
     */
    public function openPointerToBegin();

    /**
     * Opens file to write.
     * Place the file pointer at the end of the file. If the file does not exist, attempt to create it.
     * In this mode, fseek() has no effect, writes are always appended.
     *
     * @return void
     *
     * @throws HandlerExistsException
     * @throws OpenFileException
     * @throws FileNotWritableException
     */
    public function openPointerToEnd();

    /**
     * Writes content into the file.
     *
     * @param string $content Writes content.
     *
     * @return void
     *
     * @throws HandlerExistsException
     * @throws OpenFileException
     * @throws HandlerNotExistsException
     * @throws WriteFileException
     */
    public function write(string $content);
}