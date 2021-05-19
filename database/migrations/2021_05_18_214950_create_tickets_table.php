<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->foreignId('user_id')->nullable()->references('user_id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('curation_id')->nullable()->references('curation_id')->on('curations')->onDelete('set null')->onUpdate('cascade');
            $table->timestamp('created_at');
            $table->boolean('is_audition');
            $table->integer('reject_count')->default(0);
            $table->enum('status', ['pending', 'rejected', 'pending_fix', 'approved', 'published']);
            $table->integer('processed_by')->nullable();
            $table->integer('added_in_fp_version')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
