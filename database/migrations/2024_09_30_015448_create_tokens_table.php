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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol')->unique();
            $table->string(column: 'address')->unique();
            $table->string('network');
            $table->decimal('expected_price', 18, 2)->nullable();
            $table->decimal('growth_percentage', 5, 2)->nullable();
            $table->bigInteger('total_supply')->nullable();
            $table->bigInteger('circulating_supply')->nullable();
            $table->bigInteger('max_supply')->nullable();
            $table->decimal('market_cap', 20, 2)->nullable();
            $table->decimal('liquidity', 20, 2)->nullable();
            $table->boolean('lp_locked')->default(false);
            $table->bigInteger('next_supply')->nullable();
            $table->bigInteger('team_coins')->nullable();
            $table->bigInteger('ads_coins')->nullable();
            $table->decimal('security_percentage', 5, 2)->nullable();
            $table->string('listing_time')->nullable();
            $table->boolean('dex_listing')->default(false);
            $table->boolean('mint')->default(false);
            $table->boolean('freeze')->default(false);
            $table->string('jito')->nullable();
            $table->string('logo_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
