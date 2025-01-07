<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->bigIncrements('id'); // id: bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('created_by'); // created_by: bigint(20) unsigned NOT NULL
            $table->unsignedBigInteger('parent_id'); // parent_id: bigint(20) unsigned NOT NULL
            $table->unsignedBigInteger('child_id'); // child_id: bigint(20) unsigned NOT NULL
            $table->timestamps(); // created_at & updated_at

            // Indexes
            $table->index('created_by'); // Index on created_by
            $table->index('parent_id');  // Index on parent_id
            $table->index('child_id');  // Index on child_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
