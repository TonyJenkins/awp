<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

    const COMMENTS_PER_PAGE = 5;

    const RULES = [
        'comment' => 'required|min:2|max:256',
    ];

    const MESSAGES = [
        'comment.required' => 'The comment cannot be empty.',
    ];

    public function index () {

        $comments = Comment::paginate (self::COMMENTS_PER_PAGE);

        return view ('index') -> with (['comments' => $comments]);

    }

    public function create () {

            return view ('comments.create');

    }

    public function store (Request $request) {

        $request -> validate (self::RULES, self::MESSAGES);

        Comment::create ([

            'user_id' => Auth::user () -> id,
            'comment' => $request -> input ('comment'),
            'likes' => 0,

        ]);

        return redirect () -> action ('CommentController@index');

    }

    public function show (Comment $comment) {

        return view ('comments.show', compact ('comment'));

    }

    public function edit (Comment $comment) {

        return view ('comments.edit', compact ('comment'));

    }

    public function update (Request $request, Comment $comment) {

        $request -> validate (self::RULES, self::MESSAGES);

        $comment -> update ([
            'comment' => $request -> comment,
        ]);

        return redirect () -> action ('CommentController@index');

    }

    public function destroy (Comment $comment) {

        $comment -> delete ();

        return redirect () -> action ('CommentController@index');

    }

}
