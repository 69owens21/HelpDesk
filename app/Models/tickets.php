<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model // Or 'Ticket'
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'user_id',
        'assigned_to'
    ];

    // Tells laravel who created the ticket
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Tells laravel whos fixin the ticket
    public function technician()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

}
