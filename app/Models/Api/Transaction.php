<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Api\Category;

class Transaction extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'amount',
        'date',
        'description',
        'category_id',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the transaction.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include transactions of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function getFormattedAmountAttribute()
    {
        return 'R$' . number_format($this->amount, 2, ',', '.');
    }

    public function getDateFormattedAttribute()
    {
        return $this->date->format('d/m/Y');
    }

    public function getCreatedFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getTypeLabelAttribute()
    {
        return [
            1 => 'Despesas',
            2 => 'Receitas'
        ][$this->type] ?? 'Desconhecido';
    }
}
