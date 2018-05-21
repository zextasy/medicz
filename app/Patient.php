<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reg_no', 'first_name', 'last_name', 'other_name', 'email', 'phone_number', 'sex', 'date_of_birth'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
