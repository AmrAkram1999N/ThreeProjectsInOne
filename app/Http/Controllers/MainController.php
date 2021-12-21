<?php

namespace App\Http\Controllers;

use App\Http\Traits\lang;
use App\Models\Account;
use App\Models\BackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $Model = "User";
    use lang;

    protected $lang;

    public function __construct()
    {
        $this->lang = $this->lang();
        if (request()->is('Chain/Account/*')) {
            $this->Model = 'Account';
        }
    }

    public function home()
    {
        $line = Auth::guard('account')->check();
        if($line == true)
        {
            $link = route('Chain.Account.Auth.accountProfile');
        }else
        {
            $link = route('Chain.User.Auth.userProfile');
        }
        return view('ProjectNew.index',[
            'linepage' => $link,
        ]);
    }
    public function userDashBoard()
    {

        $user = Auth::guard('web')->user();
        $servicesAccount = $user->Services;
        return view('ProjectNew.user_dashboard',[
            'Services' => $servicesAccount,
        ]);
    }

    public function accountDashboard()
    {
        $account = Auth::guard('account')->user();
        $AccountServices = $account->Services;
        return view('ProjectNew.account_dashboard', [
            'AccountServices' => $AccountServices,
        ]);
    }

    public function shortLinkService()
    {
        $account = Auth::guard('account')->user();
        $ShortLink = $account->Short_Links;
        return view('ProjectNew.short_link_service', [
            'ShortLink' => $ShortLink,
            'account' => $account,

        ]);
    }

    public function bankCardService()
    {
        $account = Auth::guard('account')->user();
        $Cards =BackService::all();

        return view('ProjectNew.bank_card_service', [
            'Cards' => $Cards,
            'account' => $account,
        ]);
    }

    public function fileManagerService()
    {
        $account = Auth::guard('account')->user();
        $Folders = $account->Folders;

        $Files = $account->Files->where('main_folder', "fileManagerService");

        return view('ProjectNew.file_manager_service', [
            'account' => $account,
            'Root' => "fileManagerService",
            'Folders' => $Folders,
            'Files' => $Files,
        ]);
    }

    //Profiles
    public function userProfile()
    {
        $user = Auth::guard('web')->user();
        $UserProfile = $user->User_Profile;

        return view('ProjectNew.userProfile',[
            'UserProfile' => $UserProfile,
            'routeImage' => 'Chain.User.Auth.ChangePhoto',
        ]);
    }

    public function accountProfile()
    {
        $Page_Name = 'Account_Profile';
        $account = Auth::guard('account')->user();
        $AccountProfile = $account->Account_Profile;
        $Services = $account->Services->where('account_id', $account->id);

        return view('ProjectNew.accountProfile',[
            'AccountProfile' => $AccountProfile,
            'routeImage' => 'Chain.Account.Auth.ChangePhoto',
            'routeUpdate' => 'Chain.Account.Auth.update',
            'Services' => $Services,
            'Page_Name' => $Page_Name,
        ]);
    }



    public function cardView($lang = 'en')
    {
        $language = $this->lang($lang);
        return view('ProjectFiles.Auth.Account.cardView', [
            'number' => 1,
            'lang' => $language,
        ]);
    }

    //Project System
    public function databaseSystem()
    {
        return view('ProjectSystem.DatabaseMap');
    }
    public function interfaceSystem()
    {
        return view('ProjectSystem.InterfaceMap');
    }
    public function controllerModelSystem()
    {
        return view('ProjectSystem.Controller&Models');
    }
}
