<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $fillable = ['name', 'value', 'image', 'amount_of_cards'];



}
