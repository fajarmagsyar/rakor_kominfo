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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('status', 'ILIKE', $search);
        });
    }

    static public function getAbsenByKegiatan($kegiatan_id)
    {
        return Absen::join('users', 'users.user_id', '=', 'absen.user_id')->where('absen.kegiatan_id', $kegiatan_id)->get(['users.nama', 'users.jabatan', 'users.asal', 'absen.status_peserta']);
    }
}
