<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Database\Reference;

class Peminjaman extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nim', 'prodi',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Sync the model with Firebase.
     *
     * @return void
     */
    public function sync()
    {
        // Get the Firebase reference for the model
        $ref = $this->firebaseReference();

        // Get the attributes of the model as an array
        $attributes = $this->getAttributes();

        // Remove the primary key and timestamps from the attributes
        unset($attributes[$this->primaryKey]);
        unset($attributes[$this->getCreatedAtColumn()]);
        unset($attributes[$this->getUpdatedAtColumn()]);

        // Update the Firebase reference with the attributes
        $ref->update($attributes);
    }

    /**
     * Get the Firebase reference for the model.
     *
     * @return Reference
     */
    public function firebaseReference()
    {
        // Get the Firebase database instance
        $database = app('firebase.database');

        // Get the reference for the model
        $path = $this->getTable() . '/' . $this->getKey();
        $ref = $database->getReference($path);

        return $ref;
    }
}
