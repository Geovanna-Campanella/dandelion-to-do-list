<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarefaModel extends Model
{
    use HasFactory;

    protected $table = 'tarefa';

    public $fillable = ['titulo','descricao','dataInicio','dataTermino','status','prioridade','categoria','usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(usuarioModel::class, 'usuario_id');
    }

}
