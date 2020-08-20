<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $fillable = ['name', 'h_ct_one', 'h_ct_two', 'h_ct_three', 'half_yearly', 'f_ct_one', 'f_ct_two', 'f_ct_three', 'final'];
}
