<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    use HasFactory;

    protected $fillable = ['modelo','placa','marca','ano','preco_aluguel','descricao'];
}
