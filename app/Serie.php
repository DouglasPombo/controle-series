<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    public $timestamps = false;
    public $fillable = ['nome', 'capa'];

    public function getCapaUrlAttribute()
    {
        if($this->capa){
            return Storage::url($this->capa);
        }

        return Storage::url('/serie/image.jpeg');
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

}
