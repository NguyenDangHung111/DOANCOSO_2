<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('account', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->varchar('username',25);
            $table->varchar('firstname',10);
            $table->varchar('lastname',10);
            $table->varchar('sex',3);
            $table->varchar('phone',12);
            $table->string('address');
            $table->timestamp('date_created', $precision = 0);
            $table->string('email');
            $table->string('password');
            $table->varchar('status',3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
