<?php

namespace app\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\User.
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sortable;

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
        'email',
        'phone',
        'dignity',
        'country_id',
        'institution',
        'utc',
        'email_notification',
        'phone_notification',
        'lang',
    ];

    protected $sortable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dignity',
        'institution',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'id', 'role', 'type'];

    public function getOrders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }

    public function getPayments()
    {
        return $this->hasMany('App\Models\Payments', 'users_id');
    }

    public function addRole($role)
    {
        $thisRole = unserialize($this->role);
        if (is_array($thisRole)) {
            if (!in_array($role, $thisRole)) {
                array_push($thisRole, $role);
            }
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
        $thisRole = array_dot($thisRole);

        if (array_search($role, $thisRole) !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function getRole()
    {
        return unserialize($this->role);
    }

    public function getSkills()
    {
        return $this->hasMany('App\Models\Skills');
    }

    public function getTask()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function getCountry()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
