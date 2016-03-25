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
     * @return bool
     *
     * @throws FileNotExistsException
     * @throws MoveFileException
     * @throws NotFileException
     */
    public function rename(string $newFileName) : bool
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        if (!$this->isFile()) {
            throw new NotFileException('The path is not a file');
        }

        $newFile = new File($this->getDir()->getPath());
        $newFile->joinPath($newFileName);

        if (@rename($this->getPath(), $newFile->getPath()) === false) {
            throw new MoveFileException('Can\'t move file');
        }

        $this->setPath($newFile->getPath());

        return true;
    }

    /**
     * Moves file from exists dir to the received.
     *
     * @param IDir $dir New directory for file.
     *
     * @return bool
     *
     * @throws FileNotExistsException
     * @throws MoveFileException
     * @throws NotFileException
     */
    public function move(IDir $dir) : bool
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        if (!$this->isFile()) {
            throw new NotFileException('The path is not a file');
        }

        if (!$dir->isExists()) {
            $dir->create();
        }

        $newFile = new File($dir->getPath());
        $newFile->joinPath($this->getName());

        if (@rename($this->getPath(), $newFile->getPath()) === false) {
            throw new MoveFileException('Can\'t move file');
        }

        $this->setPath($newFile->getPath());

        return true;
    }

    /**
     * Creates new copy of file.
     *
     * @param IFile $file New file.
     *
     * @return bool
     *
     * @throws CopyFileException
     * @throws CreateDirException
     * @throws FileExistsException
     * @throws FileNotExistsException
     * @throws NotFileException
     */
    public function copy(IFile $file) : bool
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        if (!$this->isFile()) {
            throw new NotFileException('The path is not a file.');
        }

        if ($file->isExists()) {
            throw new FileExistsException('Destination file is already exists.');
        }

        $fileDir = $file->getDir();
        if (!$fileDir->isExists()) {
            $fileDir->create();
        }

        if (@copy($this->getPath(), $file->getPath()) === false) {
            throw new CopyFileException('Can\'t copy file.');
        }

        return true;
    }

    /**
     * Returns file size.
     *
     * @return int
     *
     * @throws FileNotExistsException
     * @throws FileSizeException
     */
    public function getSize() : int
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        $size = @filesize($this->getPath());

        if ($size === false) {
            throw new FileSizeException('Can\'t get file size.');
        }

        return $size;
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
        preg_match_all('|(\w*)\.(\w*)|si', $this->getName(), $matches);
        return implode(
            ".",
            array_reverse(
                array_slice(
                    array_reverse($matches[2]),
                    0,
                    $depth
                )
            )
        );
    }

    /**
     * Returns files content.
     * 
     * @return string
     * 
     * @throws FileNotExistsException
     * @throws FileNotReadableException
     * @throws ReadFileException
     */
    public function getContent() : string
    {
        if (!$this->isExists()) {
            throw new FileNotExistsException('File not exists.');
        }

        if (!$this->isReadable()) {
            throw new FileNotReadableException('File not readable.');
        }

        $content = file_get_contents($this->getPath());

        if ($content === false) {
            throw new ReadFileException('Can\'t read file.');
        }

        return $content;
    }

    /**
     * Puts content into the file.
     * Create new file if it is not exists.
     * Replace old file content if $append is False.
     *
     * @param string $content File content.
     * @param bool   $append  Shows whether content should be appended.
     *
     * @return bool
     * 
     * @throws FileNotWritableException
     * @throws WriteFileException
     */
    public function putContent(string $content, bool $append = false) : bool
    {
        if ($this->isExists() && !$this->isWritable()) {
            throw new FileNotWritableException('File not writable.');
        }

        $flags = null;

        if ($append) {
            $flags = FILE_APPEND;
        }

        if (@file_put_contents($this->getPath(), $content, $flags) === false) {
            throw new WriteFileException('Can\'t write file.');
        }

        return true;
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