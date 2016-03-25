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
 * File Stream abstract class.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
abstract class AFileStream extends AFS implements IFileStream
{
    /**
     * @var resource File pointer.
     */
    private $_handler = null;

    /**
     * Closes opened file pointer.
     *
     * @return bool
     *
     * @throws HandlerNotExistsException
     */
    public function close() : bool
    {
        $result = fclose($this->getHandler());

        if ($result) {
            $this->_handler = null;
        }

        return $result;
    }

    /**
     * Returns file pointer.
     *
     * @return resource
     *
     * @throws HandlerNotExistsException
     */
    public function getHandler() : resource
    {
        if (!$this->hasHandler()) {
            throw new HandlerNotExistsException('File has not been opened');
        }

        return $this->_handler;
    }

    /**
     * Checks whether handler exists.
     *
     * @return bool
     */
    public function hasHandler() : bool
    {
        return !is_null($this->_handler);
    }

    /**
     * Sets file pointer.
     *
     * @param resource $handler File pointer.
     *
     * @return void
     *
     * @throws HandlerExistsException
     */
    public function setHandler(resource $handler)
    {
        if ($this->hasHandler()) {
            throw new HandlerExistsException('Handler already exists.');
        }

        $this->_handler = $handler;
    }

    /**
     * Opens file in specified mode.
     *
     * @param string $mode Open mode.
     *
     * @return void
     *
     * @throws HandlerExistsException
     * @throws OpenFileException
     */
    public function openInMode(string $mode)
    {
        if ($this->hasHandler()) {
            throw new HandlerExistsException('Handler already exists.');
        }

        $handler = @fopen($this->getPath(), $mode);

        if ($handler === false) {
            throw new OpenFileException('Can\'t open file.');
        }

        $this->setHandler($handler);
    }
}