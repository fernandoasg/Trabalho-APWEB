<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 * @property id
 * @property title
 * @property intro
 * @property body
 * @property conclusion
 */
class Post extends Model
{
    protected $fillable = [
        'title', 'intro', 'body', 'conclusion'
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

}
