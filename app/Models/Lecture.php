<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'subject',
        'title',
        'author_info',
        'abstract',
        'keywords',
        'abstract_file',
        'presenter',
        'co_authors',
        'country',
    ];

    protected $casts = [
        'author_info'       => 'array',
        'co_authors'        => 'array',
        'keywords'          => 'array',
        'presenter'         => 'array',
        'abstract_file'     => 'array'
    ];

    // public function setAuthorInfoAttribute()
    // {
    //     $this->attributes['author_info'] =  json_encode(["affiliation"=>$this['author_affiliation'],"name"=>$this['author_name']]);
    // }

    // public function setCoAuthorsAttribute()
    // {
    //     if(!empty($this['co_authors'])){
    //         foreach ($this['co_authors'] as $k => $v) {
    //             $co_authors[] = [
    //                 "name"=>$this['co_name'][$k],
    //                 "country"=>$this['co_country'][$k],
    //                 "affiliation"=>$this['co_affiliation'][$k],
    //                 "email"=>$this['co_email'][$k],
    //                 "cellphone"=>$this['co_cellphone'][$k],
    //                 "telephone"=>$this['co_telephone'][$k],
    //             ];
    //         }
    //         $this->attributes['co_authors'] = json_encode($co_authors);
    //     }

    // }

    // public function setKeywordsAttribute()
    // {
    //     if(!empty($this['keywords'])){
    //         foreach($this['keywords'] as $k => $v){
    //             $keywords[] = [
    //                 'value' => $v
    //             ];
    //         }
    //         $this->attributes['keywords'] = json_encode($keywords);
    //     }

    // }
    // public function getKeywordsAttribute($value)
    // {
    //     return strip_tags(json_decode($this->$value)->name);
    // }
    // public function getCo_AuthorsAttribute()
    // {
    //     return strip_tags(json_decode($this->co_authors)->name);
    // }
}
