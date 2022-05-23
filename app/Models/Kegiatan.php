<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'kegiatan_id';
    protected $table = 'kegiatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['kegiatan_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_kegiatan', 'ILIKE', $search);
        });
    }

}