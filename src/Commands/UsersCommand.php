<?php

namespace Telegram\Bot\Commands;

use Nordal\Data\Models\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Objects;
use Telegram\Bot\Api;

class UsersCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "users";

    /**
     * @var string Command Description
     */
    protected $description = "Chck what users are currently in Chat";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
        // $this->getChatMembers();

        $members = $this->update->getMessage()->getChat()->getId();

        $user_id = $this->update->getMessage()->getChat();

        $decode = json_decode($user_id); 

        $userId = $decode->id;

        $count = $this->telegram->getChatMember(['chat_id' => $members, 'user_id' => $userId]);

        $user = json_decode($count, true);

        $first = $user['user']["first_name"];
        $last = $user['user']["last_name"];
            
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        
        $this->replyWithMessage(['text' => "$first $last"]);
				
    }
}