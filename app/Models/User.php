<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nickname',
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function addddRole($role)
    {
        $thisRole = unserialize($this->role);
        if (is_array($thisRole)) {
            if (!in_array($role, $thisRole))
                array_push($thisRole, $role);
            $this->role = serialize($thisRole);
        } else {
            $this->role = serialize([$role]);
        }
        return $this;
    }


    public function removeRole($role)
    {
        $thisRole = unserialize($this->role);
        if (array_search($role, $thisRole) !== false) {
            $key = array_search($role, $thisRole);
            unset($thisRole[$key]);
            $this->role = serialize($thisRole);
        }
        return $this;
    }


    public function checkRole($role)
    {
        $thisRole = unserialize($this->role);
        if (array_search($role, $thisRole) !== false)
            return true;
        else
            return false;
    }

    public function getRole()
    {
        return unserialize($this->role);
    }



}