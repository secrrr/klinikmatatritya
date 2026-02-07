<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('education_level')->nullable();
            $table->text('education_history')->nullable();
            $table->text('special_training')->nullable();
            $table->text('competence')->nullable();
            $table->text('research_publications')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'education_level',
                'education_history',
                'special_training',
                'competence',
                'research_publications',
            ]);
        });
    }
};
