<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = ['child_id', 'height', 'weight', 'vaccination_status', 'notes'];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
