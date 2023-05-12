<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSong extends Model
{
    use HasFactory;
    protected $table        = "songs";
    protected $primaryKey   = "id";
    protected $fillable     = ['Number','Title','Singer','Genre','Price'];
    public $timestamps=true;
}
