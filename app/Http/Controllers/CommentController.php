<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){//route model binding
        //dump(request()->all());//returns all post request variables

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('content');
        $comment->save;

        return redirect()->route('ideas.show', $idea->id)->with('success',"Comment posted successfully!");
    }
}
