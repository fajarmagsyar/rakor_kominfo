<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'artikel_id';
    protected $table = 'artikel';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['artikel_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('isi', 'ILIKE', $search);
        });
    }

}