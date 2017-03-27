<?php

namespace Telegramapp\Telegram\Commands;

use Telegramapp\Telegram\Api;
use Telegramapp\Telegram\Objects\Update;

/**
 * Interface CommandInterface.
 */
interface CommandInterface
{
    /**
     * Get Command Name.
     *
     * The name of the Telegram command.
     * Ex: help - Whenever the user sends /help, this would be resolved.
     *
     * @return string
     */
    public function getName();

    /**
     * Get Command Aliases
     *
     * Helpful when you want to trigger command with more than one name.
     *
     * @return array
     */
    public function getAliases();

    /**
     * Get Command Description.
     *
     * The Telegram command description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Process Inbound Command.
     *
     * @param Api $telegram
     * @param string $arguments
     * @param Update $update
     *
     * @return mixed
     */
    public function make(Api $telegram, $arguments, Update $update);
}
