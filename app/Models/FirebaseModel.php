<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Factory;

class FirebaseModel extends Model
{
    use HasFactory;

    public function getData()
    {
        $factory = (new Factory)->withServiceAccount(config('firebase.credentials_file'));
        $database = $factory->createDatabase();

        $reference = $database->getReference('peminjaman');
        $snapshot = $reference->getValue();

        return $snapshot;
    }
}
