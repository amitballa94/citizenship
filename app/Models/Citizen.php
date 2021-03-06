<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Citizen extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'id', 'first_name',  'lastname', 'country', 'state', 'city', 'pincode',  'gender', 'aadhar_card', 'mobile_number', 'email', 'created_by', 'updated_by'
    ];

    protected $casts = [
        'id' => "string",
        'first_name' => "string"
    ];

    public function migrateDataOne()
    {
        return $this->hasOne(MigrateList::class);
    }

    public function migrateDataMany()
    {
        return $this->hasMany(MigrateList::class);
    }
    public static function GetMessage($resource, $message)
    {
        return response()->json([
            'message' => $message,
            'data'    => $resource,
        ]);
    }
    public function scopeDeleteCitizen($query, $request, $user_id)
    {
        return $user_id->delete();
    }
}
