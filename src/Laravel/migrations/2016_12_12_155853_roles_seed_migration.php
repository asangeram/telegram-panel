<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\Role;
use App\Data\Models\User;


class RolesSeedMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $id = DB::table('roles')->insertGetId (
            array ('slug' => 'admin', 'name' => 'Admin')
        );

        $id = DB::table('roles')->insertGetId (
            array ('slug' => 'teacher', 'name' => 'Teacher')
        );

        $id = DB::table('roles')->insertGetId (
            array ('slug' => 'student', 'name' => 'Student')
        );
        // Schema::table('users', function($table)
        // {
        
        // $table->string('last_name')->after('name')->nullable();

        // });

        $studentId = Role::where('name', 'student')->firstOrFail()->id;
        $users = User::all();
        foreach ($users as $user){
        DB::table('role_users')->insert(array('role_id' => $studentId, 'user_id' => $user->id));        
        }
   
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::table('roles')->trunkate();

    }


}
