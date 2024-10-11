<?php

namespace App\Models;

use App\Models\FeeStructer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeHead extends Model
{
    use HasFactory;
    public function feeStructers()
    {
        return $this->hasMany(FeeStructer::class, 'fee_head_id');
    }
}
