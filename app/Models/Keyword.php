<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
protected $primaryKey = 'keyword_id';
    use HasFactory;

    public function assigned_keyword()
    {
        return $this->belongsTo(Assigned_keywords::class, 'assigned_keywordid');
    }
}
