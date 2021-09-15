<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // URL to external API
    private $userApiUrl = 'https://jsonplaceholder.typicode.com/users';


    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Decides whether to update or add
     */
    public function addOrUpdate()
    {
        $apiUsers = Http::get($this->userApiUrl)->json();
        foreach ($apiUsers as $apiUser) {
            $user = User::find($apiUser['id']);
            $user ? $user->update($apiUser) : $this->addUser($apiUser);
        }
    }

    /**
     * Saves a new user
     * @param $apiUser
     */
    public function addUser($apiUser)
    {
        $user = new User($apiUser);
        $user->save();
    }

    public function mostActive()
    {
        $mostActiveUsers = User::mostActiveUsers(3);
        $dataPoints = [];
        foreach ($mostActiveUsers as $key => $value) {
            array_push($dataPoints, ["y" => $value, "label" => $key]);
        }


       /* $dataPoints = array(
            array("y" => 25, "label" => "nazwa"),
            array("y" => 20, "label" => "Snazsa"),
        );*/

        return view('users.mostActive', [
            'dataPoints' => $dataPoints,
        ]);

    }
}
