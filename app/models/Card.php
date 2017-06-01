<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;


class Card extends Eloquent  implements UserInterface {

    use UserTrait;
    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_card_user';
    protected $hidden = array('password', 'remember_token');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('code', 'password',  'user_id', 'active', 'created_by', 'updated_by', 'trial_day', 'time_active', 'phone', 'admin_id', 'sell');
    protected $dates = ['deleted_at'];

    public function hasCourse() 
    {
        return $this->belongsToMany('Course', 'mdl_card_course', 'card_id', 'course_id')->withTimestamps();
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
