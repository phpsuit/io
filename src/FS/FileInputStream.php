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
 * File Input Stream.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class FileInputStream extends AFileStream implements IFileInputStream
{
    /**
     * Opens file to read in "r" mode.
     * Place the file pointer to the beginning of the file.
     *
     * @return void
     * 
     * @throws HandlerExistsException
     * @throws OpenFileException
     */
    public function open()
    {
        $this->openInMode('r');
    }

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
    public function read() : string
    {
        if (!$this->hasHandler()) {
            $this->open();
        }

        $buffer = fgets($this->getHandler());

        if ($buffer === false) {
            throw new EndFileException('End file.');
        }

        if (!feof($this->getHandler())) {
            throw new ReadFileException('Can\'t read file.');
        }

        return $buffer;
    }
}