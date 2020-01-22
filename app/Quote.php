<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes_tables';
    protected $fillable = ['author', 'quote'];
    
}
