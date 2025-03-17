<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    use HasFactory;

    protected $fillable = ['ProductCode', 'DateTime', 'Quantity', 'UnitPrice', 'TotalPrice'];
}
