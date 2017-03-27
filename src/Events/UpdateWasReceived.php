<?php

namespace Telegramapp\Telegram\Events;

use Telegramapp\Telegram\Events\EmitsEvent;
use Telegramapp\Telegram\Api;
use Telegramapp\Telegram\Objects\Update;

class UpdateWasReceived extends EmitsEvent
{
    /**
     * @var Update
     */
    private $update;

    /**
     * @var Api
     */
    private $telegram;

    /**
     * UpdateWasReceived constructor.
     *
     * @param Update $update
     * @param Api    $telegram
     */
    public function __construct(Update $update, Api $telegram)
    {
        $this->update = $update;
        $this->telegram = $telegram;
    }

    /**
     * @return Update
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @return Api
     */
    public function getTelegram()
    {
        return $this->telegram;
    }
}
