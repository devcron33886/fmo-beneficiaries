<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\GradeEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EcdBeneficiary extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['grade' => GradeEnum::class, 'gender' => GenderEnum::class, 'status' => StatusEnum::class];

    protected $guarded = [];
}
