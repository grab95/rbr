<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // URL to external API
    private $userApiUrl = 'https://jsonplaceholder.typicode.com/users';


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


    /**
     * Shows a page with a chart of the most active users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function mostActive()
    {
        $mostActiveUsers = User::mostActiveUsers(5);
        $dataPoints = [];
        foreach ($mostActiveUsers as $key => $value) {
            array_push($dataPoints, ["y" => $value, "label" => User::find($key)->username]);
        }

        return view('users.mostActive', [
            'dataPoints' => $dataPoints,
        ]);

    }

    /**
     * Shows the user details page
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);

    }
}
