<?php

namespace Myitedu\EmailServices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $fillable=['field_name','field_value','ip_address','browser','uuid','form_id','email_sent'];
}
