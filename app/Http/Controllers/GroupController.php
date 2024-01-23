<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Novel;
use App\Models\Chapter;

class GroupController extends Controller
{
    public function GroupDetail($id){
        $group = Group::find($id);
        $novelId = Chapter::where('groupId', '=', $id)->distinct()->pluck('novel_id');
        $novel = Novel::whereIn('id', $novelId)->get();

        // dd($novel);
        
        return view('GroupDetail', ['group' => $group, 'novel' => $novel]);
    }
}
