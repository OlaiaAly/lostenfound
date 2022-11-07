<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;


    /**
     * Cost of each reveal
     */
    public const PRICE = 10;


    public static $publicationID;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'item',
        'reference',
        'picture',
        'province',
        'city',
        'description',
        'date',
        'user_id',
        'type'
    
    ];


    /**
     * Chama o dono da publicacao
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Para a tabela de 
     */
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function payedUsers(){
        return $this->belongsToMany('App\Models\User', 'payed', 'user_id', 'publication_id');
    }

}