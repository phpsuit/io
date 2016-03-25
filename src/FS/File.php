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
 * File class.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class File extends AFS implements IFile
{
    /**
     * Changes file name.
     *
     * @param string $newFileName New file name.
     *
     * @return void
     */
    public function rename(string $newFileName)
    {
        // TODO: Implement rename() method.
    }

    /**
     * Moves file from exists dir to the received.
     *
     * @param IDir $dir New directory for file.
     *
     * @return void
     */
    public function move(IDir $dir)
    {
        // TODO: Implement move() method.
    }

    /**
     * Creates new copy of file.
     *
     * @param IFile $file New file.
     *
     * @return File
     */
    public function copy(IFile $file) : File
    {
        // TODO: Implement copy() method.
    }

    /**
     * Returns file size.
     *
     * @return int
     */
    public function getSize() : int
    {
        // TODO: Implement getSize() method.
    }

    /**
     * Return extention of file, if file does not have extention
     * it will return empty string.
     * Usage: testfilename.kext.exe.sh $file->getExtension(3) return kext.exe.sh,
     * $file->getExtension(2) return exe.sh.
     *
     * @param int $depth Extension depth.
     *
     * @return string
     */
    public function getExtension(int $depth = 1) : string
    {
        // TODO: Implement getExtension() method.
    }

    /**
     * Returns files content.
     *
     * @return string
     */
    public function getContent() : string
    {
        // TODO: Implement getContent() method.
    }

    /**
     * Puts content into the file.
     * Replace old file content.
     * Create new file if it is not exists.
     *
     * @param string $content
     *
     * @return void
     */
    public function putContent(string $content)
    {
        // TODO: Implement putContent() method.
    }

    /**
     * Remove FS entity from file system.
     * 
     * @return bool
     * 
     * @throws FileNotExistsException
     * @throws NotFileException
     * @throws RemoveFileException
     */
    public function remove() : bool
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        if (!$this->isFile()) {
            throw new NotFileException('The path is not a file');
        }

        if (unlink($this->getPath()) === false) {
            throw new RemoveFileException('Can\'t remove file');
        }
        
        return true;
    }
}