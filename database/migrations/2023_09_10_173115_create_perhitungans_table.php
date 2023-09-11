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
        Schema::create('perhitungans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            // Data original
            $table->String('duration');
            $table->String('cost');
            $table->String('load');
            $table->String('difficult');
            // Skoring data (original di skoring berdasarkan table yang sudah ditentukan (menggunakan if-else))
            $table->String('duration_skor');
            $table->String('cost_skor');
            $table->String('load_skor');
            $table->String('difficult_skor');
            // utility ( 100 x ((Cmax - Cout i) / (Cmax - Cmin)) )
            $table->decimal('duration_utility', 5, 2);
            $table->decimal('cost_utility', 5, 2);
            $table->decimal('load_utility', 5, 2);
            $table->decimal('difficult_utility', 5, 2);
            // utility x bobot
            $table->decimal('duration_ut_bobot', 5, 2);
            $table->decimal('cost_ut_bobot', 5, 2);
            $table->decimal('load_ut_bobot', 5, 2);
            $table->decimal('difficult_ut_bobot', 5, 2);
            // Nilai Akhir untuk perankingan (SUM(ut_bobot))
            $table->decimal('nilai_akhir', 5, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('lists_project_id_foreign');
        $table->dropIndex('lists_project_id_index');
        $table->dropColumn('project_id');
        Schema::dropIfExists('perhitungans');
    }
};
