<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DB;

class DataUpload extends Model
{
    protected $table = 'data_upload';
    protected $fillable = array(
        'file_name'
    );

    protected $dates = array(
        'created_at',
        'updated_at'
    );
}
