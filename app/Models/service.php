<?php

namespace App\Models;

use Illuminate\Queue\Worker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function work()
    {
        return $this->belongsTo(Work::class)->withDefault() ;
    }

}
