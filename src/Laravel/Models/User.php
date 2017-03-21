<?php


namespace App\Data\Models;

use Carbon\Carbon;
use Cartalyst\Sentinel\Users\EloquentUser;
use DB;
use App\Definitions\Roles;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;


/**
 * Class User
 * @package App
 *
 * @property int $Id
 * @property string $Name
 * @property string $LastName
 * @property string $Email
 * @property $Gender
 * @property string $PhoneNumber
 * @property $Birthday
 * @property string Nickname
 * @property string Avatar
 * @property int MapId
 */
class User extends EloquentUser
{
    use Eloquence;
    use Mappable, Mutable;

    
    protected $table = 'users';

	protected $loginNames = ['Email'];
    
    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $appends = ['Id','Name','LastName','Email','Gender', 'PhoneNumber','Birthday','Nickname',
        'Avatar','CharacterNumber','TeacherId','MapId','ChapterId', 'TeacherId', 'ChatId', 'TokenKey', 'TokenExpiration',
    ];

    protected $hidden = [
        'password', 'remember_token','id','name','last_name','email','gender','phone_number','birth_day',
        'nickname','avatar','created_at','updated_at','character_number','teacher_id','map_id','chapter_id', 'chat_id', 'token_key', 'token_expiration',
    ];

    protected $fillable = [
        'Name','name', 'LastName', 'Email', 'email', 'Gender', 'PhoneNumber', 'Birthday', 'Nickname', 'nickname', 'ChapterId', 'TeacherId', 'Password', 'password',
        'ChatId', 'TokenKey', 'TokenExpiration',  
    ];

    protected $maps = [
        'Id' => 'id',
        'Name' => 'name',
        'LastName' => 'last_name',
        'Email' => 'email',
        'Gender' => 'gender',
        'PhoneNumber' => 'phone_number',
        'Birthday' => 'birth_day',
        'Nickname' => 'nickname',
        'Password' => 'password',
        'Avatar' => 'avatar',
        'CharacterNumber' => 'character_number',
        'TeacherId' => 'teacher_id',
        'MapId' => 'map_id',
        'ChapterId' => 'chapter_id',
        'ChatId' => 'chat_id',
        'TokenKey' => 'token_key',
        'TokenExpiration' => 'token_expiration',

    ];



    protected $with = ['Roles'];


    
    public function setBirthDayAttribute($value)
    {
        $this->attributes['birth_day'] = Carbon::parse($value)->format('Y-m-d');
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users');
    }

    public function groups()
    {
        return $this->belongsToMany(Groups::class, 'group_users');
    }

    public function Map()
    {
        return $this->belongsTo(Map::class);
    }

    public function Messages()
    {
        return $this->belongsToMany(Notifications::class);
    }

    public function Chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function Actions()
    {
        return $this->hasMany(Action::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function hasItem($itemId)
    {
        if ($this->items()->where('item_id', '=', $itemId)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function money()
    {
        $money = (int)DB::select('SELECT SUM(bests) as suma FROM (SELECT task_id, MAX(exp) as bests FROM actions WHERE user_id = ? GROUP BY task_id) AS bes;', array($this->getUserId()))[0]->suma;
        if($this->money == 0) {
            $this->money = $money;
            $this->save();
        }
        return $this->money;
    }

    public function addToMoney(int $money)
    {
        $this->money += $money;
        $this->save();
    }

    public function updateAndGetCurrentChapter() {
        // get the current available chapter
        $now = Carbon::now();
        $current_chapter = Chapter::where('DateStart', '<=', $now)->get()->last();
        if ($current_chapter->id === $this->ChapterId) {
            return $this->ChapterId;
        }
        // count tasks in chapters
        $tasksInChapters = DB::select('
SELECT chapter_id, count(*) as cnt FROM tasks GROUP BY chapter_id ORDER BY chapter_id DESC');
        // Count how many tasks are done in chapters
        // TODO now we just count actions. If user has 2 entries for the same task, this will fail

        $actionsInLastChapter = DB::select('
SELECT chapter_id, count(DISTINCT t.id) as cnt FROM actions
  left join (select id, chapter_id from tasks) as t on actions.task_id=t.id
where user_id=? GROUP BY chapter_id ORDER BY chapter_id DESC LIMIT 1', array($this->id));

        if (count ($actionsInLastChapter)) {
            foreach ($tasksInChapters as $tasksInChapter) {
                if ($tasksInChapter->chapter_id === $actionsInLastChapter[0]->chapter_id) {
                    // If user has done as many tasks as it's needed, then we set his chapter_id to the next chapter
                    if ($tasksInChapter->cnt === $actionsInLastChapter[0]->cnt) {
                        $this->ChapterId = $tasksInChapter->chapter_id+1;
                        $this->save();
                    }
                    // We need to add this if, bacause when we added chapter_id to users table, some users already were in chapter 2
                    else if ($this->ChapterId !== $tasksInChapter->chapter_id) {
                        $this->ChapterId = $tasksInChapter->chapter_id;
                        $this->save();
                    }
                    return $this->ChapterId;
                }
            }
        }

        return $this->ChapterId;
    }

    public function isAdmin()
    {
        return $this->hasRole(Roles::ADMIN);
    }


    public function isTeacher() {

        return $this->hasRole(Roles::TEACHER);
    }

    public function isStudent() {

        return $this->hasRole(Roles::STUDENT);
    } 
    
    public function hasRole($role) {
        
        $userRoles = $this->roles()->get();
        return $userRoles->where('Slug','=',$role)->count() > 0;
       
    }

    
    public function getUser() {
        
        $user = Sentinel::getUser()->all();
        
        View::share('name', $user);   
        
    }
    
}
