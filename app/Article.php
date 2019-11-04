<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'excerpt'];

    public function path()
    {
        return route('article.show', $this);
    }

    public function author() 
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function tags()
    {
        //um artigo pertence a muitas tags
        return $this->belongsToMany(Tag::class);
    }
}
