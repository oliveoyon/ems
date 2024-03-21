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
        Schema::create('child_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->integer('submenu_id');
            $table->string('childmenu_name');
            $table->string('child_menu_slug')->unique();
            $table->text('child_menu_desc')->nullable();
            $table->string('upload');
            $table->integer('child_menu_status');
            $table->integer('dept_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_menus');
    }
};
