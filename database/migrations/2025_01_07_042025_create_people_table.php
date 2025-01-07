<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id'); // id: bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('created_by'); // created_by: bigint(20) unsigned NOT NULL
            $table->string('first_name', 255)->collation('utf8mb4_unicode_ci'); // first_name: varchar(255)
            $table->string('last_name', 255)->collation('utf8mb4_unicode_ci'); // last_name: varchar(255)
            $table->string('birth_name', 255)->nullable()->collation('utf8mb4_unicode_ci'); // birth_name: varchar(255), nullable
            $table->string('middle_names', 255)->nullable()->collation('utf8mb4_unicode_ci'); // middle_names: varchar(255), nullable
            $table->date('date_of_birth')->nullable(); // date_of_birth: date, nullable
            $table->timestamps(); // created_at & updated_at

            // Indexes
            $table->index('created_by'); // Index on created_by
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
