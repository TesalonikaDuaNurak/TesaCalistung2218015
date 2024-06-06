<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model {
    use HasFactory;
    protected $fillable = ['id_user', 'id_paket', 'total', 'status_bayar', 'foto'];
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $dates1 = ['updated_at'];
    protected $primaryKey = 'id_pembayaran';
    public function User(){
    return $this->belongsTo(Users::class, 'id','id_user');
    }
    public function Paket(){
        return $this->belongsTo(Paket::class, 'id_paket','id_paket');
        }
}