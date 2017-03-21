<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.13
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2016, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MigrationCartalystSentinel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::dropIfExists('activations');
        Schema::create('activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

	    Schema::dropIfExists('persistences');
        Schema::create('persistences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code');
        });

	    Schema::dropIfExists('reminders');
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

	    Schema::dropIfExists('roles');
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->text('permissions')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('slug');
        });
        Schema::dropIfExists('groups');
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('chat_id')->nullable(); 
            $table->string('group_nr')->nullable();
            $table->string('invite_link')->nullable();
            $table->string('group_slug')->nullable()->unique();       
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('group_nr');
        });

        Schema::dropIfExists('group_users');
        Schema::create('group_users', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('group_nr')->nullable();
            $table->nullableTimestamps();

            $table->engine = 'InnoDB';
            $table->primary(['user_id', 'group_nr']);
        });

        Schema::dropIfExists('notifications');
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('message');            
            $table->timestamps();
        });


	    Schema::dropIfExists('role_users');
        Schema::create('role_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->nullableTimestamps();

            $table->engine = 'InnoDB';
            $table->primary(['user_id', 'role_id']);
        });

	    Schema::dropIfExists('throttle');
        Schema::create('throttle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('type');
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->index('user_id');
        });

        if (!Schema::hasTable('users')) {
	        Schema::create('users', function(Blueprint $table) {
		        $table->increments('id');
		        $table->string('email');
		        $table->string('password');
		        $table->text('permissions')->nullable();
		        $table->timestamp('last_login')->nullable();      
		        $table->string('last_name')->nullable();
                $table->string('name')->nullable();
		        $table->string('nickname');
		        $table->timestamps();

		        $table->engine = 'InnoDB';
		        $table->unique('email');
                        $table->unique('nickname');
	        });
        } else {
        	Schema::table('users', function(Blueprint $table){

        		if (!Schema::hasColumn('users','last_login')) {
			        $table->timestamp('last_login')->nullable();
		        }
		        if (!Schema::hasColumn('users','permissions')) {
			        $table->timestamp('permissions')->nullable();
                }
                if (!Schema::hasColumn('users','chat_id')) {
                    $table->string('chat_id')->nullable();
                }
                if (!Schema::hasColumn('users','user_id')) {
                    $table->string('user_id')->nullable();
                }
                if (!Schema::hasColumn('users','token_key')) {
                    $table->string('token_key')->nullable()->unique();
                }
                if (!Schema::hasColumn('users','token_expiration')) {
                    $table->datetime('token_expiration')->nullable();
                }
                // if (!Schema::hasColumn('users','phone_number')) {
                //     $table->string('phone_number')->nullable();
                // }

	        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activations');
        Schema::drop('persistences');
        Schema::drop('reminders');
        Schema::drop('roles');
        Schema::drop('role_users');
        Schema::drop('throttle');
    }
}
