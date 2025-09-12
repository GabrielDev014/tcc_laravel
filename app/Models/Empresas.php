<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'cnpj_basico',
        'razao_social',
        'natureza_juridica',
        'qualificacao',
        'capital_social',
        'porte',
        'ente_federativo_responsavel'
    ];
}
