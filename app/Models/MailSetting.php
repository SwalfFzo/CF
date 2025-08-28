<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    protected $fillable = [
        'ms_tenant',
        'ms_client_id',
        'ms_client_secret',
        'ms_redirect_uri',
        'graph_from',
    ];
}
