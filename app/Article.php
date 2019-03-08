<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasManyComments(){
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
