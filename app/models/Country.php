<?php

namespace App\Models;
use App\Models\CountryRegion;

class Country extends Model
{
    public static function getTable()
    {
        return "countries";
    }

    public static function getRegions($country_id)
    {
        return CountryRegion::table()->where("country_id", $country_id)->findMany();
        // return \ORM::forTable("country_regions")->where("country_id", $country_id)->findMany();
    }
}