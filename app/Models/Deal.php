<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price',
        'responsible_user_id',
        'group_id',
        'status_id',
        'pipeline_id',
        'loss_reason_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'closed_at',
        'closest_task_at',
        'is_deleted',
        'score',
        'account_id',
    ];
}
