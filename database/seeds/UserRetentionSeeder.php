<?php

use League\Csv\Reader;
use App\Models\UserRetention;
use Illuminate\Database\Seeder;


class UserRetentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$csv = public_path('export.csv');

        $reader = Reader::createFromPath($csv);

		foreach ($reader as $index => $row) {
			if($index > 0){
				$record = explode(';', $row[0]);

				UserRetention::insert([
		 		'user_id' => (!is_null($record[0]) || $record[0] != '')? $record[0]: 0,
		 		'created_at' => $record[1],
		 		'onboarding_percentage' => (!is_null($record[2]) || $record[2] != '')? $record[2]: 0,
		 		'count_applications' => (!is_null($record[3]) || $record[3] != '')? $record[3]: 0,
		 		'count_accepted_applications' => (!is_null($record[4]) || $record[4] != '')? $record[4]: 0,
		 	]);
			}

		}
    }
}
