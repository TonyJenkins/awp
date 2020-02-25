<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'user_id',
        'updating_user_id',
        'comment',
        'likes',
    ];

    public function upvoteAndSave () {

        $this -> likes += 1;

        $this -> timestamps = false;
        $this -> update ();
        $this -> timestamps = true;

    }

    public function downvoteAndSave () {

        $this -> likes -= 1;

        $this -> timestamps = false;
        $this -> update ();
        $this -> timestamps = true;

    }

    public function user () {

        return $this -> belongsTo (User::class);

    }

    public function updating_user () {

        return $this -> belongsTo (User::class);

    }

}
