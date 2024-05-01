<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Expense
 *
 * @property $id
 * @property $table_id
 * @property $item
 * @property $description
 * @property $date
 * @property $quantity
 * @property $price
 * @property $establishment
 * @property $category
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Table $table
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expense extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['table_id', 'item', 'description', 'date', 'quantity', 'price', 'establishment', 'category', 'type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table()
    {
        return $this->belongsTo(\App\Models\Table::class, 'table_id', 'id');
    }
    
}
