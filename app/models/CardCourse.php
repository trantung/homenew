<?php
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CardCourse extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_card_course';
    public $timestamps = true;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('card_id', 'course_id');

    public function scopeCard($query, $cardId) {
        return $query->where('card_id', $cardId);
    }

    public function setAttributeCreatedAt()
    {
        $this->created_at = Carbon::now();
    }

}
