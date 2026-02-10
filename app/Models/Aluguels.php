<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carros;
use App\Models\Clientes;

class Aluguels extends Model
{
    use HasFactory;
    protected $fillable =['data_inicio','data_fim','valor_diaria','valor_total','status','carro_id','cliente_id'];
}
