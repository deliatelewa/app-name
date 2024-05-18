<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ideas = Idea::orderBy('created_at','DESC');

        // search
        if(request()->has('search')){
            $ideas = $ideas->where('content','like',request()->get('search',''));
        }
        // $idea = new Idea([
        //     'content' => 'mayowa',
        // ]);
        // // $idea->content = "test";
        // // $idea->likes = 0;
        // $idea->save();

        // dump(Idea::all());
        // $users = [
        //     [
        //         'name' => 'Alex',
        //         'age' => 30
        //     ],
        //     [
        //         'name' => 'Dan',
        //         'age' => 25
        //     ],
        //     [
        //         'name' => 'John',
        //         'age' => 17
        //     ],
        // ];

        return view('dashboard',[
            // 'ideas' => Idea::all()
            'ideas' => $ideas->paginate(5)
        ]
            // 'dashboard',
            // [
            //     'userss' => $users
            // ]
        );
    }
}
