<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditResult extends Model
{
    use HasFactory;


    protected $fillable = [
        'token_id',
        'security_audit',
        'contract_verified',
        'developer_team',
    ];

    // العلاقات
    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
