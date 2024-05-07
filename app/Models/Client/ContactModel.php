<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\ContactMail;
use Response;
use Mail;


class ContactModel extends Model
{
    use HasFactory;

    protected $table = "contacts";

    protected $primaryKey = 'id';

    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
  
   /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "dduong1703@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
