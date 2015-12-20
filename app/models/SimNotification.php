<?php
// use Carbon\Carbon;

class SimNotification extends \Eloquent {
	// protected $fillable = [];
    protected $table = 'simnotifications';
	protected $fillable   = ['from_user','to_user', 
				'subject', 'body', 'is_read', 'is_pending', 'receipt',
				'created_at', 'read_at', 'receipt_at'];
 

    public function user()
    {
        return $this->belongsTo('User');
    }

    // public function getDates()
    // {
    //     return ['created_at', 'read_at', 'receipt_at'];
    // }
 
}