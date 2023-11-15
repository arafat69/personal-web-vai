<?php

namespace App\Repositories;

use App\Models\OfficeHour;
use Illuminate\Http\Request;

class OfficeHourRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return OfficeHour::class;
    }

    public static function storeByRequest(Request $request): OfficeHour
    {
        return self::create([
            //
        ]);
    }

    public static function updateByRequest(Request $request, OfficeHour $officeHour): OfficeHour
    {
        $officeHour->update([
            //
        ]);

        return $officeHour;
    }
}
