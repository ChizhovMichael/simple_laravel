<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlackList;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $blacklist = BlackList::orderBy('id', 'desc')->paginate(20);

        return view('admin.welcome', [
            'list'  => $blacklist
        ]);
    }

    public function deleteList($id) {
        BlackList::where('id', $id)->delete();

        return redirect()->back();
    }

    public function addList($id) {

        $blacklist = BlackList::find($id);
        $blacklist->status = 'on';
        $blacklist->save();
        
        return redirect()->back();

    }
}
