<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseRecord extends Model
{
    use HasFactory;

    protected $fillable = ['expense_category_id','title','amount','date'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }


}
