<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = [
    	'user_id', 'data_checkup', 'peso', 'altura', 'pressao_arterial', 'nivel_glicose', 'colesterol_LDL', 'colesterol_HDL', 'observacoes',
    ];
}
