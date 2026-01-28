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
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'name')) {
                $table->renameColumn('name', 'fullName');
            }
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->after('fullName');
            }
            if (!Schema::hasColumn('users', 'ip')) {
                $table->string('ip')->nullable();
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable();
            }
            if (!Schema::hasColumn('users', 'profile_pic')) {
                $table->string('profile_pic')->nullable();
            }
            if (!Schema::hasColumn('users', 'brand_id')) {
                $table->unsignedBigInteger('brand_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('fullName', 'name');
            $table->dropColumn(['username', 'ip', 'address', 'profile_pic', 'brand_id']);
        });
    }
};
