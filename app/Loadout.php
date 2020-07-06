<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Loadout extends Model
{
    use Favoriteable, Filterable, CrudTrait;

    protected $fillable = ['name', 'description', 'character_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function guns()
    {
        return $this->belongsToMany(Gun::class, 'loadout_gun');
    }

    public function mods()
    {
        return $this->belongsToMany(Mod::class, 'loadout_mod');
    }

    public function overclocks()
    {
        return $this->belongsToMany(Overclock::class, 'loadout_overclock');
    }
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'loadout_equipment');
    }
    public function equipment_mods()
    {
        return $this->belongsToMany(EquipmentMod::class, 'loadout_equipment_mod');
    }
    public function throwable()
    {
        return $this->hasOne(Throwable::class, 'id', 'throwable_id');
    }
}
