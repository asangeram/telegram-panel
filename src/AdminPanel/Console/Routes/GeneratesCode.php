<?php

namespace Telegramapp\Telegram\AdminPanel\Console\Routes;

/**
 * Interface GeneratesCode.
 *
 * @package Acacha\AdminLTETemplateLaravel\Console\Routes
 */
interface GeneratesCode
{
    /**
     * Generates route code
     *
     * @return mixed
     */
    public function code();

    /**
     * Set replacements.
     *
     * @param $replacements
     * @return mixed
     */
    public function setReplacements($replacements);
}
