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

namespace PS\IO;

/**
 * File Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IFile extends IFS
{
    // TODO: extensions methods
    
    /**
     * Writes to file.
     *
     * @param string $content New file content.
     * @param bool   $replace If true it will replace file if it's exists.
     *
     * @throws \phpsuit\io\FileExistsException
     * @throws \phpsuit\io\WriteFileException
     * @throws \phpsuit\io\OpenFileException
     *
     * @return bool
     */
    public function write($content = '', $replace = false);

    /**
     * Opens file.
     *
     * @link http://php.net/manual/en/function.fopen.php.
     *
     * @param string $mode The mode parameter specifies the type of access you require to the stream.
     *
     * @throws \phpsuit\io\OpenFileException
     *
     * @return resource
     */
    public function getHandler($mode);

    /**
     * Return file size in bytes.
     *
     * @throws \phpsuit\io\ReadFileException
     * @throws \phpsuit\io\FileNotExistsException
     *
     * @return float
     */
    public function getSize();

    /**
     * Move file to destination.
     *
     * @param phpsuit\io\IFile $destination Destination file.
     *
     * @throws \phpsuit\io\MoveFileException
     *
     * @return boolean
     */
    public function move(IFile $destination);

    /**
     * Return content of the file.
     *
     * @throws \phpsuit\io\ReadFileException
     * @throws \phpsuit\io\FileNotExistsException
     *
     * @return string
     */
    public function getContent();

    /**
     * Returns array of file lines.
     *
     * @throws \phpsuit\io\ReadFileException
     * @throws \phpsuit\io\FileNotExistsException
     *
     * @return array
     */
    public function getContentArray();

    /**
     * Append string into end of the file,
     * if file does not exist attempt to create it.
     *
     * @param string $content Content to be append.
     *
     * @throws \phpsuit\io\FileExistsException
     * @throws \phpsuit\io\WriteFileException
     * @throws \phpsuit\io\OpenFileException
     *
     * @return boolean
     */
    public function append($content);

    /**
     * Return extension of file, if file does not have extension
     * it will return empty string.
     * Usage: testfilename.kext.exe.sh $file->getExtension(3) return kext.exe.sh,
     * $file->getExtension(2) return exe.sh.
     *
     * @param int $depth Depth.
     *
     * @return string
     */
    public function getExtension($depth = 1);

    /**
     * Delete file.
     *
     * @throws \phpsuit\io\FileNotExistsException
     * @throws \phpsuit\io\RemoveFileException
     *
     * @return boolean
     */
    public function remove();

    /**
     * Copy this file to destination file.
     *
     * @param phpsuit\io\IFile $destination Destionation file path.
     *
     * @throws \phpsuit\io\ReadFileException
     * @throws \phpsuit\io\FileExistsException
     * @throws \phpsuit\io\CopyFileException
     *
     * @return boolean
     */
    public function copyTo(IFile $destination);
}