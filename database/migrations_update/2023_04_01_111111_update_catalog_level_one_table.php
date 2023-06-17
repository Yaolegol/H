<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateCatalogLevelOneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('catalog_level_one')
            ->where('id', 7)
            ->update([
                "title" => "Ягода"
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('catalog_level_one')
            ->where('id', 7)
            ->update([
                "title" => "Ягода"
            ]);
    }
}
