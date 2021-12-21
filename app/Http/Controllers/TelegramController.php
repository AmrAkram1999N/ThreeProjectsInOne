<?php

namespace App\Http\Controllers;

use App\Http\Traits\HttpRequest;
use App\Http\Traits\TelegramComponents;
use App\Models\Account;
use App\Models\BackService;
use Illuminate\Support\Facades\Auth;

class TelegramController extends Controller
{
    use HttpRequest;
    use TelegramComponents;

    public function webhook()
    {
        return $this->apiRequest('setWebhook', [
            'url' => url(route('webhook')),
        ]) ? ['Success'] : ['Something went Wrong'];
    }

    public function index()
    {
        $result = json_decode(file_get_contents('php://input'));
        $action = $result->message->text;
        $user_id = $result->message->from->id;
        $telegramUsername = $result->message->from->username;

        $account = Account::where('telegram_id', $user_id)->first();
        $add_account = Account::where('username', $action)->first();


        if ($action == '/start') {
            $this->start($user_id);
            return true;
        }

        if ($action == '🏦 Bank_Service') {
            $this->telegramBankService($user_id);
            return true;
        }

        if ($action == '✏️ Register Line') {
            $this->telegramServiceRegisterInLine($user_id, $telegramUsername);
            return true;
        }
        // Back to menu
        if ($action == '🔰 Main Menu') {
            $this->main($user_id);
            return true;
        }

        if ($action == '🗂 File_Manager_Service') {
            if ($account) {
                $this->file_manager($user_id);
                return true;
            } elseif ($action == '🗂 File_Manager_Service') {
                $this->TelegramMessageAuth($user_id);
                return true;
            }
        }

        if ($action == '🗂 My Folders') {
            if ($account) {
                $this->folders($account, $user_id);
                return true;
            } else{
                $this->TelegramMessageAuth($user_id);
                return true;
            }
        }

        if ($action == '📝 My Files') {
            if ($account) {
                $this->files($account, $user_id);
                return true;
            } elseif($action == '📝 My Files') {
                $this->TelegramMessageAuth($user_id);
                return true;
            }
        }

        if ($action == '⛓ Short_Link_Service') {
            if ($account) {
                $this->short_link_service($user_id);
                return true;
            } elseif($action == '⛓ Short_Link_Service') {
                $this->TelegramMessageAuth($user_id);
                return true;
            }
        }

        if ($action == '⛓ Your Links') {
            if ($account) {
                $this->links($account, $user_id);
                return true;
            } elseif($action == '⛓ Your Links') {
                $this->TelegramMessageAuth($user_id);
                return true;
            }
        }

        if(!$add_account)
        {
            $this->TelegramAuth($action,$user_id);
        }

    }

    public function TelegramAuth($action, $user_id)
    {
        $add_account = Account::where('username', $action)->first();

        if ($add_account == null) {

            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "This username is not correct!",
            ]);

        } else {

            $add_account->update([
                'telegram_id' => $user_id,
            ]);

            $this->start($user_id);
        }
    }

    public function TelegramMessageAuth($user_id)
    {
        $text = "Before Using this service, please following this linkand take an account there\nhttps://shorting-links.000webhostapp.com/\nIf you already have an account, send it to me please:";
        $option = [['🔰 Main Menu']];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);

    }

    public function start($user_id)
    {
        $text = "Welcome you in Website Services Site, choose your service from below buttons!";
        $option = [
            ['🗂 File_Manager_Service'],
            ['⛓ Short_Link_Service'],
            ['🏦 Bank_Service'],
        ];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);
    }

    public function file_manager($user_id)
    {
        $text = 'Welcome you in your folder_system!!';
        $option = [
            ['🗂 My Folders'],
            ['📝 My Files'],
            ['🔰 Main Menu'],
        ];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => "🗂",
        ]);

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);
    }
    public function short_link_service($user_id)
    {
        $text = 'Welcome you in your short_link_service!!';
        $option = [
            ['⛓ Your Links'],
            ['🔰 Main Menu'],
        ];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => "⛓",
        ]);

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);
    }
    public function links($account, $user_id)
    {
        $numbers_of_links = 0;
        $text = "Your Links:";
        $option = [['🔰 Main Menu']];
        $Short_links = $account->Short_Links;

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
        ]);

        if ($Short_links) {
            foreach ($Short_links as $link) {
                $numbers_of_links = $numbers_of_links + 1;
                $this->apiRequest('sendMessage', [
                    'chat_id' => $user_id,
                    'text' => "Website Name: $link->web_site_name" . "\nOld Url: $link->url_old" . "\nNew Url: $link->url_new" . "\nNumber of visitors: $link->clicks",
                ]);
            }

            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You have $numbers_of_links links",
                'reply_markup' => $this->keyboard($option),
            ]);
        } else {
            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You don't have links yet",
                'reply_markup' => $this->keyboard($option),
            ]);
        }

    }
    public function folders($account, $user_id)
    {
        $numbers_of_Folders = 0;
        $text = "Your Folders:";
        $option = [['🔰 Main Menu']];
        $Folders = $account->Folders;

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
        ]);

        if ($Folders) {
            foreach ($Folders as $Folder) {
                $numbers_of_Folders = $numbers_of_Folders + 1;
                $this->apiRequest('sendMessage', [
                    'chat_id' => $user_id,
                    'text' => $Folder->folder_name,
                ]);
            }

            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You have $numbers_of_Folders folders",
                'reply_markup' => $this->keyboard($option),
            ]);
        } else {
            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You don't have folders",
                'reply_markup' => $this->keyboard($option),
            ]);
        }

    }

    public function files($account, $user_id)
    {
        $numbers_of_Files = 0;
        $text = "Your Files:";
        $option = [['🔰 Main Menu']];
        $Files = $account->Files;

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
        ]);
        if ($Files) {
            foreach ($Files as $File) {
                $numbers_of_Files = $numbers_of_Files + 1;

                $this->apiRequest('sendMessage', [
                    'chat_id' => $user_id,
                    'text' => "📝 Name: $File->file_name" . "\n🗂Folder: $File->main_folder" . "\n🧩Extension: $File->file_type" . "\n📊Size: $File->file_size\n****************************",
                ]);
            }

            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You have $numbers_of_Files folders",
                'reply_markup' => $this->keyboard($option),
            ]);
        } else {
            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => "You don't have files",
                'reply_markup' => $this->keyboard($option),
            ]);
        }

    }

    public function main($user_id)
    {
        $this->start($user_id);
    }

    public function telegramBankService($user_id)
    {
        $text = 'Welcome you in your bank service if you want to get a number on line click on the button getNumber!!';
        $option = [
            ['✏️ Register Line'],
            ['🔰 Main Menu'],
        ];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);
    }

    public function telegramServiceRegisterInLine($user_id, $telegramUsername)
    {
        $account = Auth::guard('account')->user();

        $accountTelegramId = BackService::where('telegram_id', $user_id)->first();

        if ($accountTelegramId == null) {
            if ($account !== null) {
                $cardModel = BackService::orderBy('clientnumber', 'DESC')->first();
                if ($cardModel !== null) {
                    $num = $cardModel->id + 1;

                    $cardModel = BackService::create([
                        'account_id' => $account->id,
                        'telegramUsername' => $telegramUsername,
                        'telegram_id' => $user_id,
                        'clientname' => "Client$num",
                        'clientnumber' => $num,
                    ]);

                    $time = $this->remainingTime($cardModel->id);

                    $this->telegramTime($user_id, $time);
                } else {
                    $cardModel = BackService::create([
                        'account_id' => $account->id,
                        'telegramUsername' => $telegramUsername,
                        'telegram_id' => $user_id,
                        'clientname' => "Client1",
                        'clientnumber' => 1,
                    ]);

                    $cardModel->update(['clientnumber', $cardModel->id]);

                    $time = $this->remainingTime($cardModel->id);

                    $this->telegramTime($user_id, $time);
                }

            } else {
                $cardModel = BackService::orderBy('clientnumber', 'DESC')->first();
                if ($cardModel) {
                    $num = $cardModel->id + 1;

                    $cardModel = BackService::create([
                        'telegramUsername' => $telegramUsername,
                        'telegram_id' => $user_id,
                        'clientname' => "Client$num",
                        'clientnumber' => $num,
                    ]);

                    $time = $this->remainingTime($cardModel->id);

                    $this->telegramTime($user_id, $time);
                } else {
                    $cardModel = BackService::create([
                        'telegramUsername' => $telegramUsername,
                        'telegram_id' => $user_id,
                        'clientname' => "Client1",
                        'clientnumber' => 1,
                    ]);

                    $cardModel->update(['clientnumber', $cardModel->id]);

                    $time = $this->remainingTime($cardModel->id);

                    $this->telegramTime($user_id, $time);
                }
            }
        } else {
            $text = "You have taken the number ($accountTelegramId->clientnumber) before";
            $option = [
                ['🔰 Main Menu'],
            ];

            $this->apiRequest('sendMessage', [
                'chat_id' => $user_id,
                'text' => $text,
                'reply_markup' => $this->keyboard($option),
            ]);
        }
    }

    public function remainingTime($client)
    {
        $time = 0;
        $modelCard = BackService::all();
        foreach ($modelCard as $card) {
            if ($card->where('clientnumber', '<', $client)->first()) {
                $randomNumber = random_int(1, 5);
                $time += $randomNumber;
            }
        }

        return $time;
    }

    public function telegramTime($user_id, $time)
    {
        $text = "You will wait $time";
        $option = [
            ['🔰 Main Menu'],
        ];

        $this->apiRequest('sendMessage', [
            'chat_id' => $user_id,
            'text' => $text,
            'reply_markup' => $this->keyboard($option),
        ]);
    }
}
