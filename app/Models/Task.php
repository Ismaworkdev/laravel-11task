<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importa la clase BelongsTo
use Illuminate\Database\Eloquent\SoftDeletes; // Importa el trait SoftDeletes
class Task extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [

        'name',
        'description',
    ];

    /**
     * get the user that owns the task 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
