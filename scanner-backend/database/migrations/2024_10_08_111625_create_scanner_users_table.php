<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scanner_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('user');
            $table->integer('scanner_id');
        });
        DB::table('user')->insert([
            [
                'id' => 1,
                'username' => 'user',
                'password' => 'pwd',
            ]]);

        DB::table('grocery_list')->insert([
            [
                'id' => 1,
                'user_id' => 1
            ]]);

        DB::table('scanner_user')->insert([
            [
                'user_id' => 1,
                'scanner_id' => 1,
            ]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scanner_users');
    }
};
