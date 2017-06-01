<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;


class CardAdmin extends Eloquent  implements UserInterface {

    use UserTrait;
    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_card_admin';
    protected $hidden = array('password', 'remember_token');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('username', 'password', 'role_id');
    protected $dates = ['deleted_at'];

    public static function isAdmin()
    {
        if(Auth::member()->get()->role_id == CARD_ROLE_ADMIN){
        return true;
        }
        else{
            return false;
        }
    }
    public static function isMember()
    {
        if(Auth::member()->get()->role_id == CARD_ROLE_MEMBER){
            return true;
        }
        else{
            return false;
        }
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getTimeActiveAttribute($value)
    {
        if ($value) {
            return date("d/m/Y - H:i", $value);
        }
    }

}
