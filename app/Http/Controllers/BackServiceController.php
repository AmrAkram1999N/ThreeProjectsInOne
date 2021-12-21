<?php

namespace App\Http\Controllers;

use App\Http\Traits\HttpRequest;
use App\Http\Traits\lang;
use App\Http\Traits\TelegramComponents;
use App\Models\BackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackServiceController extends Controller
{
    use lang;
    use HttpRequest;
    use TelegramComponents;
    protected $lang;
    protected $link;

    public function __construct()
    {
        $this->lang = $this->lang();

        $line = Auth::guard('account')->check();
        if($line == true)
        {
            $this->link = route('Chain.Account.Auth.accountProfile');
        }else
        {
            $this->link = route('Chain.User.Auth.userProfile');
        }
    }

    // public function BankServiceWebhook()
    // {
    //     return $this->apiRequest('setWebhook', [
    //         'url' => url(route('BankServiceWebhook')),
    //     ]) ? ['Success'] : ['Something went Wrong'];
    // }

    // public function index()
    // {
    //     $result = json_decode(file_get_contents('php://input'));
    //     $action = $result->message->text;
    //     $user_id = $result->message->from->id;
    //     if ($action == 'start') {

    //         $text = 'yes';
    //         $option = [
    //             ['🗂 File_Manager_Service'],
    //             ['⛓ Short_Link_Service'],
    //         ];

    //         $this->apiRequest('sendMessage', [
    //             'chat_id' => $user_id,
    //             'text' => $text,
    //             'reply_markup' => $this->keyboard($option),
    //         ]);
    //     }
    // }

    public function getNumber()
    {
        $account = Auth::guard('account')->user();

        if ($account == null) {
            $cardModel = BackService::orderBy('clientnumber', 'DESC')->first();

            if ($cardModel == null) {

                $cardModel = BackService::create([
                    'clientname' => "Client" . 1,
                    'clientnumber' => 1,
                ]);

                $cardModel->update(['clientnumber' => $cardModel->id]);

                $time = $this->remainingTime($cardModel->id);

                session()->put('time',$time);

                return view('ProjectNew.cardView', ['number' => $cardModel->clientnumber, 'lang' => $this->lang, 'linepage' => $this->link,]);
            } else {
                $num = $cardModel->id + 1;

                $cardModel = BackService::create([
                    'clientname' => "Client" . $num,
                    'clientnumber' => $num,
                ]);

                $time = $this->remainingTime($num);

                session()->put('time',$time);

                return view('ProjectNew.cardView', ['number' => $cardModel->clientnumber,'lang' => $this->lang,'linepage' => $this->link,]);
            }

        } else {
            $cardModel = $account->Cards->orderBy('clientnumber', 'DESC')->first();

            if ($cardModel == null) {

                $cardModel = BackService::create([
                    'user_id' => $account->id,
                    'clientname' => "Client" . 1,
                    'clientnumber' => 1,
                ]);

                $cardModel->update(['clientnumber' => $cardModel->id]);

                $time = $this->remainingTime($cardModel->id);

                session()->put('time',$time);

                return view('ProjectNew.cardView', ['number' => $cardModel->clientnumber, 'lang' => $this->lang,'linepage' => $this->link,]);
            } else {
                $num = $cardModel->id + 1;

                $cardModel = BackService::create([
                    'user_id' => $account->id,
                    'clientname' => "Client" . $num,
                    'clientnumber' => $num,
                ]);

                $time = $this->remainingTime($num);

                session()->put('time',$time);

                return view('ProjectNew.cardView', ['number' => $cardModel->clientnumber,'lang' => $this->lang,'linepage' => $this->link,]);
            }
        }

    }

    public function previousNumber($number)
    {


        $moreThan = BackService::where('clientnumber', '=', $number - 1)->first();

        if($moreThan == null)
        {
            return redirect()->route('cardView')->with('number',"There is nobody before you!!");
        }else
        {
            return view('ProjectNew.cardView',['number' => $moreThan->clientnumber,'lang' => $this->lang,'linepage' => $this->link,]);
        }
    }

    public function nextNumber($number)
    {
        $moreThan = BackService::where('clientnumber', '=', $number + 1)->first();

        if($moreThan == null)
        {
            return redirect()->route('cardView')->with('number',"There is nobody after you!!");
        }else
        {
            return view('ProjectNew.cardView',['number' => $moreThan->clientnumber,'lang' => $this->lang,'linepage' => $this->link,]);
        }
    }

    public function remainingTime($client)
    {
        $time = 0;
        $modelCard = BackService::all();
        foreach($modelCard as $card)
        {
            if($card->where('clientnumber', '<', $client)->first()){
                $randomNumber = random_int(1,5);
                $time += $randomNumber;
            }
        }

        return $time;
    }

    public function getClient()
    {
        $account = Auth::guard('account')->user();
        $modelCard = $account->Cards->where('status', 'null')->first();

        if($modelCard == null)
        {
            return redirect()->route('Chain.Account.Auth.bankCardService')->with('status',"There is no clients at this moment!! wait a little please ^_^");
        }
        session()->put('ClientNumber',$modelCard->clientnumber);

        $modelCard->delete();

        return redirect()->route('Chain.Account.Auth.bankCardService');
    }





}
