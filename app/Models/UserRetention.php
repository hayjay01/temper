<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRetention extends Model
{
    protected $guarded = ['id'];


    public static function getStatistics()
    {

    	$data = UserRetention::selectRaw("week(created_at) as week,
    						(SUM(count_accepted_applications) / SUM(count_applications)  * 100) as users_percentage,
    						onboarding_percentage")
    						->groupBy(\DB::raw('week'), 'onboarding_percentage')
    						->get();

    	return $data;
    }

}
