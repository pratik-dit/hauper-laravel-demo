<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_interest', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->decimal('principal_amount', 10, 2)->default(0);
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->decimal('time_period', 5, 2)->default(0);
            $table->decimal('total_interest', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_interest');
    }
}
