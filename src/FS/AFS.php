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

use PS\IO\AIO;

/**
* File System abstract class.
*
 * @category  PHPSuit
 * @package   PHPSuit/IO
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2016 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
abstract class AFS extends AIO implements IFS
{
    /**
     * @var string FS path. 
     */
    private $_path = '';
    
    /**
     * Create new FS object.
     * Sets path.
     *
     * @param string $path entity path.
     */
    public function __construct(string $path = '')
    {
        parent::__construct($path);
        $this->setPath($path);
    }

    /**
     * Checks whether a entity exists in set path.
     *
     * @return boolean
     */
    public function isExists() : bool
    {
        return file_exists($this->getPath());
    }

    /**
     * Checks whether a entity writable.
     *
     * @return boolean
     */
    public function isWritable() : bool
    {
        return is_writable($this->getPath());
    }

    /**
     * Checks whether a entity readable.
     *
     * @return boolean
     */
    public function isReadable() : bool
    {
        return is_readable($this->getPath());
    }

    /**
     * Tells whether the entity path is a symbolic link.
     *
     * @return boolean
     */
    public function isLink() : bool
    {
        return is_link($this->getPath());
    }

    /**
     * Returns the target of a symbolic link.
     *
     * @return string
     *
     * @throws NotLinkException
     */
    public function readLink() : string
    {
        if (!$this->isLink()) {
            throw new NotLinkException('The FS entity is not a link');
        }

        return readlink($this->getPath());
    }

    /**
     * Tells whether the entity path is a regular file.
     *
     * @return boolean
     */
    public function isFile() : bool
    {
        return is_file($this->getPath());
    }

    /**
     * Creates symlink to the existing path with specified name link.
     *
     * @param IPath $link Symlink path.
     *
     * @return bool
     */
    public function symLink(IPath $link) : bool
    {
        return symlink($this->getPath(), $link->getPath());
    }

    /**
     * Creates hard link to the existing path with specified name link.
     *
     * @param IPath $link Link path.
     *
     * @return bool
     */
    public function link(IPath $link) : bool
    {
        return link($this->getPath(), $link->getPath());
    }

    /**
     * Tells whether the io path is a directory.
     *
     * @return boolean
     */
    public function isDir() : bool
    {
        return is_dir($this->getPath());
    }

    /**
     * Return name of FS entity path.
     *
     * @return string
     */
    public function getName() : string
    {
        return basename($this->getPath());
    }

    /**
     * Return dir of the FS entity.
     *
     * @return Dir
     */
    public function getDir() : Dir
    {
        return new Dir(dirname($this->getPath()));
    }

    /**
     * Returns IO\FS path.
     *
     * @return string
     */
    public function getPath() : string
    {
        return $this->_path;
    }

    /**
     * Sets IO\FS path.
     *
     * @param string $path IO\FS path.
     *
     * @return void
     */
    public function setPath(string $path)
    {
        $this->_path = $path;
    }

    /**
     * Returns whether path has been set up.
     *
     * @return bool
     */
    public function hasPath() : bool
    {
        return strlen($this->getPath()) > 0;
    }

    /**
     * Change IO\FS mode.
     *
     * @param integer $mode Permissions mode.
     *
     * @return boolean
     */
    public function chmod(int $mode) : bool
    {
        return chmod($this->getPath(), $mode);
    }

    /**
     * Change IO\FS owner.
     *
     * @param string $user User name or user id.
     *
     * @return boolean
     */
    public function chown(string $user) : bool
    {
        return chown($this->getPath(), $user);
    }

    /**
     * Change IO\FS group.
     *
     * @param string $group Group name or group id.
     *
     * @return boolean
     */
    public function chgrp(string $group) : bool
    {
        return chgrp($this->getPath(), $group);
    }

    /**
     * Joins specified path to exists.
     *
     * @param string $path Path to be joined.
     *
     * @return void
     */
    public function joinPath(string $path)
    {
        if (!$this->hasPath()) {
            $this->setPath($path);
            return;
        }

        $path = trim($path, DIRECTORY_SEPARATOR);
        $oldPath = $this->getPath();

        if (in_array(substr($oldPath, -1), array('\\', '/'))) {
            $oldPath = substr($oldPath, 0, (strlen($oldPath) - 1));
        }

        $this->setPath($oldPath . DIRECTORY_SEPARATOR . $path);
    }
}