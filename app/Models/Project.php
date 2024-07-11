<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function ecdBeneficiaries(): HasMany
    {
        return $this->hasMany(EcdBeneficiary::class);
    }

    public function trees(): HasMany
    {
        return $this->hasMany(FruitTreesBeneficiary::class);
    }
}
