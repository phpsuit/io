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
 * File Interface.
 *
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface IFile extends IFS, IFileContent
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
    public function rename(string $newFileName) : bool ;

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
    public function move(IDir $dir) : bool ;

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
    public function copy(IFile $file) : bool;

    /**
     * Returns file size.
     *
     * @return int
     * 
     * @throws FileNotExistsException
     * @throws FileSizeException
     */
    public function getSize() : int ;

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
    public function getExtension(int $depth = 1) : string ;
}