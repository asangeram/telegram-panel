<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;
use Validator;
use DB;
use Telegramapp\Telegram\Laravel\Models\User;

class TelegramController extends Controller
{

public function getUpdates()
  {
    $updates = Telegram::getUpdates();
		
    dd($updates);
  } 
public function Test()
{
	$response = Telegram::getMe();

	$botId = $response->getId();
	$firstName = $response->getFirstName();
	$username = $response->getUsername();
	
	
	dd($response);
}
public function setWebhook()
{
	$response = Telegram::setWebhook(['url' => 'https://rocksoft.pl/telegram/348713440:AAGCWT2FoQ4Kg3HAHjkn9rdLKdNZiseT7CI/webhook']);
	dd($response);
}
public function webhookUpdate()
{
$updates = Telegram::getWebhookUpdates();
$update = Telegram::commandsHandler(true);
    return 'ok';	
}
public function deleteWebhook()
{
	$response = Telegram::removeWebhook();
	dd($response);
}
public function postSendGroup(Request $request)
    {   
        $messageType = $request->get('messageType');

        $group = $request->get('group');

        $groupExplode = explode('|', $group);

        $inviteLink = $groupExplode[0];

        $chatId = $groupExplode[1];

        $groupNr = $groupExplode[2];


        $usersInGroup = DB::table('group_users')
                            ->join('users', 'group_users.user_id', '=', 'users.id')
                            ->where('group_nr', '=', $groupNr)
                            ->pluck('users.chat_id');

        $users = User::all();

        $message = $request->get('message');


        $rules = [
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Message is required');
        }

        foreach($usersInGroup as $chatId){

            if ($chatId != null AND $messageType == 'inviteLink'){
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "$message $inviteLink",
                ]);
            }elseif ($chatId != null AND $messageType == 'sendToAll'){
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "$message",
                ]);
        }
        if ($chatId != null AND $messageType == 'sendToGroup'){
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "$message",
                ]);
    }
}

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Message sent');
    }

 public function postMessage(User $user, Request $request)
    {

        $chatId = $user->chat_id;

        $message = $request->get('message');

        $rules = [
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Message is required');

        }
        
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "$message",
            ]);
        

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Message sent');
    }


public function chatMembersCount()
{
        $chat_id = DB::table('groups')->get()->pluck(['chat_id'])->last();

        $members = Telegram::getChatMember(['chat_id' => '284016932', 'user_id' => '284016932']);


        $user = json_decode($members, true);

        $first = $user['user']["first_name"];
        $last = $user['user']["last_name"];

        dd($first, $last);

    }
}
