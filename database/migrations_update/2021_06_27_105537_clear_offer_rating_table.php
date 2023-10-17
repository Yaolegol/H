<?php

use App\Models\OfferRating;
use Illuminate\Database\Migrations\Migration;

class ClearOfferRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            OfferRating::truncate();

            error_log('ClearOfferRatingTable SUCCESS');
        } catch (\Exception $e) {
            error_log($e);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
