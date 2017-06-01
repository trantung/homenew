<?php

class Teacher extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_giaovien';

    public function scopeSubject($query, $subjectId) {
		return $query->where('monday', $subjectId);
	}

}
