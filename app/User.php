<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $fillable = [
        'nombre_completo','name','cod_usuario','email','carrera_id', 'password','rol_id', 'imagen_user',
    ];





    protected $hidden = [
        'password', 'remember_token',
    ];
//Para los roles
//relación de muchos a muchos
    public function roles(){
        return $this
            ->belongsTo('App\Role')//muchos usuarios solo puede tener un rol
            ->withTimestamps();
    }

    //relaciones
    public function reserveds(){
        return $this
            ->belongsTo('App\Reserved');//varios usuarios pertenececn a una carrera(de muchos a uno)

    }

    public function carrers(){
        return $this
            ->hasMany('App\Carrer'); // un usuario puede tener varias carrreras (de uno a muchos)
    }





//Para las autorizaciones
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}

