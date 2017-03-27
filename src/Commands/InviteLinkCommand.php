<?php

namespace Telegramapp\Telegram\Commands;

use Nordal\Data\Models\User;
use Telegramapp\Telegram\Actions;
use Telegramapp\Telegram\Commands\Command;
use Telegramapp\Telegram\Objects;
use Telegramapp\Telegram\Api;

class InviteLinkCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "invitelink";

    /**
     * @var string Command Description
     */
    protected $description = "Save group invite link to DB";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
        $this->inviteLink();


        $this->replyWithChatAction(['action' => Actions::TYPING]);
        
        $this->replyWithMessage(['text' => "Your Link has been added to DB. :)"]);
				
    }
}