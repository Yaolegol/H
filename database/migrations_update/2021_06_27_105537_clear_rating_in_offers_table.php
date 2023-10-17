<?php

use App\Models\Offer;
use Illuminate\Database\Migrations\Migration;

class ClearRatingInOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            $list = Offer::all();

            foreach ($list as $item) {
                $item->update([
                    'rating' => 0,
                    'rating_values' => 0,
                    'rating_votes' => 0,
                ]);
            }

            error_log('ClearRatingInOffersTable SUCCESS');
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
