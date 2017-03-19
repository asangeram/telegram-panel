<?php

namespace Telegramapp\Telegram\AdminPanel\Filesystem;

/**
 * Class FileAlreadyExists.
 *
 * @package Acacha\Llum\Filesystem
 */
class FileAlreadyExists extends \Exception
{
    /**
     * FileAlreadyExists constructor.
     */
    public function __construct()
    {
        parent::__construct('File already exists');
    }
}
