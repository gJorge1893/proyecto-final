<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shared
 *
 * @property $id
 * @property $table_id
 * @property $user_id
 * @property $permission_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Permission $permission
 * @property Table $table
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Shared extends Model
{
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['table_id', 'user_id', 'permission_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo(\App\Models\Permission::class, 'permission_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table()
    {
        return $this->belongsTo(\App\Models\Table::class, 'table_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
