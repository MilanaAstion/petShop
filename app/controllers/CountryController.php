<?php
namespace App\Controllers;

use App\Models\CountryRegion;

class CountryController extends AdminController
{
    public function getRegions($country_id)
    {
        $regions = CountryRegion::table()->where("country_id", $country_id)->findArray();
        echo json_encode($regions);
    }
}