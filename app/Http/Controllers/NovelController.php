<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use App\Models\Group;
use App\Models\Chapter;

class NovelController extends Controller
{
    public function getAllNovel(){
        $novel = Novel::with(['latestChapter' => function ($query) {
            $query->latest('created_at');
        }])->get();

        $groupId = $novel->pluck('latestChapter.groupId')->toArray();
        
        $groups = Group::whereIn('id', $groupId)->get();

        $groupMap = [];

        foreach ($groupId as $groupId) {
            $matchingGroups = $groups->where('id', $groupId);

            foreach ($matchingGroups as $group) {
                $groupMap[] = $group;
            }
        }

        // dd($groups);

        return [
            'novels' => $novel,
            'groups' => $groupMap,
        ];
    }

    public function Homepage(){
        $data = $this->getAllNovel();
        return view('HomePage', ['data' => $data]);
    }

    public function viewDetail($id){
        $novel = Novel::find($id);
        $chapter = Chapter::where('novel_id', $id)->get();

        $groupId = $chapter->pluck('groupId')->toArray();

        $groups = Group::whereIn('id', $groupId)->get();

        $genreList = $novel->genres;

        $groupMap = [];

        foreach ($groupId as $groupId) {
            $matchingGroups = $groups->where('id', $groupId);

            foreach ($matchingGroups as $group) {
                $groupMap[] = $group;
            }
        }

        // dd($groupMap);

        return view('NovelDetail', ['novel' => $novel, 'genre' => $genreList, 'chapter' => $chapter, 'group' => $groupMap]);
    }

    
}
