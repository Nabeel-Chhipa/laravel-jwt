<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Group;

class IndexController extends Controller
{
    public function index() {
        // return Member::find(2)->getGroup;
        return Member::with('getGroup')->get();
    }

    // public function groupView(Request $req, $id) {
    //     $getId = Group::find($id)->getGroup;
    //     return 'Group Id : ' . $getId;
    // }

    public function AddGroup(Request $req) {
        $member = new Member;
        $member->name = $req->input('name');
        $member->email = $req->input('email');
        $mamber->contact = $req->input('contact');
        $mamber->save();
        return redirect('AddGroup');
    }
}
