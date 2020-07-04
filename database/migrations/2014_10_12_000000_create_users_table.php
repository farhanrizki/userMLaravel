<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert
        DB::table('users')->insert(
            array(
                'nama' => 'Farhan Rizki',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
