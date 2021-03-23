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

    protected $types = [
        '',
        'งานคณะฯ',
        'งานตามชื่อตำแหน่ง',
        'งานที่ได้รับมอบหมาย',
        'งานเพื่อส่วนรวม'
    ];

    public function getTypeName() {
        // switch ($this->type) {
        //     case 1:
        //         return "งานคณะฯ";
        //         break;
        //     case 2:
        //         return "งานตามชื่อตำแหน่ง";
        //         break;
        //     case 3:
        //         return "งานที่ได้รับมอบหมาย";
        //         break;
        //     case 4:
        //         return "งานเพื่อส่วนรวม";
        //         break;
        //     default:
        //         return "งานที่ไม่รู้จัก";
        // }
        return $this->types[$this->type];
    }

    public function getTypes() {
        return $this->types;
    }
}
