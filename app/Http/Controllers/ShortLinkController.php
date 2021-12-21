<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortLinkController extends Controller
{
    //Add_Short_Link
    public function addShortLink(Request $request)
    {
        $account_id = Auth::guard('account')->id();

        $request->validate([
            'website_name' => ['required', 'string' , 'max:15'],
            'url_request' => ['required','url'],
        ]);

        $accountShortLinkAccess = ShortLink::create([
            'web_site_name' => $request->website_name,
            'url_old' => $request->url_request,
            'account_id' => Auth::guard('account')->id(),
        ]);

        $accountShortLinkAccess->update(['url_new' => 'BT'. $accountShortLinkAccess->id]);

        return redirect()->route('Chain.Account.Auth.shortLinkService');
    }


    public function editShortLink(Request $request, $id)
    {
        $account = Auth::guard('account')->user();
        $Model = $account->Short_Links->where('id', $id)->first();
        $Model->update([
            'web_site_name' => $request->website_name,
            'url_old' => $request->url_request,
        ]);

        return redirect()->route('Chain.Account.Auth.shortLinkService');
    }

    public function deleteShortLink($id)
    {
        $account = Auth::guard('account')->user();
        $Model = $account->Short_Links->where('id', $id)->first();
        $Model->delete();

        return redirect()->route('Chain.Account.Auth.shortLinkService');
    }

    public function Redirect_Short_Link($id)
    {
        $account = Auth::guard('account')->user();
        $Model = $account->Short_Links->where('id', $id)->first();
        $url_old = $Model->url_old;
        $Model->update(['clicks'=> $Model->clicks +1]);
        return redirect($url_old);
    }
}
