<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //เป็นการบอกว่า จะมี field ไหนบ้างที่ยอมให้ทำการ create ได้
    protected $fillable = [
        'type',
        'name',
        'detail',
        'status'
    ];
}
