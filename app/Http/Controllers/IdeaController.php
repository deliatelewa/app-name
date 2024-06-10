<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){
        // return view('ideas.show',[
        //     'idea' => $idea
        // ]);

        return view('ideas.show',compact('idea'));
    }

    public function store(){//create model
        // dump();
        request()->validate([
            'content' => 'required|min:3|max:240' //idea is name of textarea in submit-idea.blade
        ]);
        $idea = Idea::create([
            'content' => request()->get('content',''),
        ]);

        return( redirect()-> route('dashboard')->with('success','Idea created successfully!'));
    }

    // public function destroy($id){
    //     // dump("deleting");
    //     // where id=1;
    //     //$idea = Idea::where('id', $id)->first()->delete();
    //     Idea::where('id', $id)->firstOrFail()->delete();

    //     // $idea->delete();

    //     return( redirect()-> route('dashboard')->with('success','Idea deleted successfully!'));
    // }

    public function destroy($id){
        // $idea->delete();

        Idea::where('id', $id)->firstOrFail()->delete();

        return( redirect()-> route('dashboard')->with('success','Idea deleted successfully!'));
    }

    public function edit(Idea $idea){
        $editing = true;

        return view('ideas.show',compact('idea', 'editing'));
    }

    public function update(Idea $idea){
        request()->validate([
            'content' => 'required|min:3|max:240' //idea is name of textarea in submit-idea.blade
        ]);

        $idea->content = request()->get('content','');
        $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success',"Idea updated successfully!");
    }
}
