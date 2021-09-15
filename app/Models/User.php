<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $casts = [
        'address' => 'array',
        'company' => 'array',
    ];
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;

    /**
     *  User and Post relation: User can add many posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'userId');
    }


    /**
     * Checks users with the most posts in the last week. [DESC]
     * [User ID => number of posts]
     * @param int $userLimit
     * @return array
     */
    public static function mostActiveUsers(int $numberOfUsers): array
    {
        $numberOfPosts = [];
        $date = Carbon::today()->subDays(7);
        $users = User::all();

        foreach ($users as $user) {
            $numberOfPosts[$user->id] = DB::table('posts')
                ->where('userId', '=', $user->id)
                ->where('updated_at', '>=', $date)
                ->count();
        }

        // Top users: [id => number of posts]
        $topUsersCollection = collect($numberOfPosts)->sortDesc()->take($numberOfUsers);
        $topUsers = $topUsersCollection->toArray();

        return $topUsers;
    }
}
