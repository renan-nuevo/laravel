<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('Id', 'FirstName', 'LastName', 'DateCreated')->get();

        $duplicates = $users->duplicates(function($item) {
            return $item['FirstName'].$item['LastName'];
        });

        $uniques = $users->unique(function($item) {
            return $item['FirstName'].$item['LastName'];
        });

        return ['duplicateUsers' => $duplicates, 'uniqueUsers' => $uniques];
    }
}
