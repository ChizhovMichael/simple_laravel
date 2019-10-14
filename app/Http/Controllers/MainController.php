<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlackList;

class MainController extends Controller
{
    //

    public function index()
    {
        $blacklist = BlackList::orderBy('id', 'desc')
            ->where('status', 'on')
            ->paginate(10);

        return view('welcome', [
            'list'          => $blacklist,
        ]);
    }

    public function getInformation($info)
    {
        $blacklist = BlackList::where('category', $info)
            ->where('status', 'on')
            ->orderBy('id', 'desc')->paginate(10);

        return view('welcome', [
            'list'          => $blacklist,
        ]);
    }

    public function addToBlackList(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'position'   => 'required',
            'comment' => 'required',
            'applicant' => 'required|max:255',
            'applicant_email' => 'required'
        ]);

        $blacklist = new BlackList();
        $blacklist->category = $request->info;
        $blacklist->name = $request->name;
        $blacklist->company = $request->company;
        $blacklist->address = $request->address;
        $blacklist->position = $request->position;
        $blacklist->comment = $request->comment;
        $blacklist->photo = $request->photo;
        $blacklist->applicant = $request->applicant;
        $blacklist->applicant_email = $request->applicant_email;
        $blacklist->status = 'off';

        $blacklist->save();

        return redirect()->back()->with('success', 'Спасибо за ваше сообщение!')
            ->with('message', 'Только объединившись мы сможем сделать российскую медицину лучше!');
    }
}
