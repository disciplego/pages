<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->string('route')->nullable();
            $table->boolean('target')->nullable();
            $table->text('help_text')->nullable();
            $table->date('published_at')->nullable();
            $table->dateTime('unpublished_at')->nullable();
            $table->integer('menuable_id')->nullable();
            $table->string('menuable_type')->nullable();
            $table->boolean('is_activated')->default(0)->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('order_column')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
