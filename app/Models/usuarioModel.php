<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class usuarioModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';

    public $fillable = ['id', 'nome', 'email', 'senha', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function getAuthPassword()
    {
        return $this->senha;
    }
    public function tarefas()
    {
        return $this->hasMany(tarefaModel::class, 'usuario_id');
    }
}
