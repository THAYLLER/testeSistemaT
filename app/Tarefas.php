<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $fillable = ['nome','descricao','status','user_id'];
    protected $guarded = ['id', 'created_at', 'update_at', 'delete_at'];
    protected $table = 'tarefas';
}
