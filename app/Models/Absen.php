<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'absen_id';
    protected $table = 'absen';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['absen_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('status', 'ILIKE', $search);
        });
    }

}