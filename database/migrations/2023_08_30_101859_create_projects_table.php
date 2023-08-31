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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned()->index()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string("project_name");
            $table->string("project_desc");
            $table->string("project_duration");
            $table->string("project_cost");
            $table->string("project_load")->nullable();
            $table->string("project_difficult")->nullable();
            $table->string("project_document")->nullable();
            $table->boolean("project_is_review")->default('0')->comment('1 - Reviewed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('lists_client_id_foreign');
        $table->dropIndex('lists_client_id_index');
        $table->dropColumn('client_id');
        Schema::dropIfExists('projects');
    }
};
