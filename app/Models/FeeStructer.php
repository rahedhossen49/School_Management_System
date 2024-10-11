<?php
namespace App\Models;

use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeStructer extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'academic_year_id',
        'fee_head_id',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
    ];

    // Use camelCase for relationship methods
    public function feeHead(){
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');  // Fixed the foreign key too
    }
}
