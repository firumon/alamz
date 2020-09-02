<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',['admin','broker','compliance'])->default('broker')->after('email');
            $table->enum('status',['Active','Inactive'])->default('Active')->after('remember_token');
        });
        \App\User::create([
            'name' => 'Administrator',
            'email' =>  'admin@alramz.ae',
            'password' => '123456',
            'role'  => 'admin'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role','status']);
        });
    }
}
