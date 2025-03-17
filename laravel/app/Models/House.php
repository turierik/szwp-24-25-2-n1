<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'owner_id', 'tenant_id', 'rent', 'size'];

    public function rooms(){
        return $this -> belongsToMany(Room::class) -> withTimestamps() -> withPivot(['size']);
    }

    public function owner(){
        return $this -> belongsTo(User::class, 'owner_id');
    }

    public function tenant(){
        return $this -> belongsTo(User::class, 'tenant_id');
    }
}
