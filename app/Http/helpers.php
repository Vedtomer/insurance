<?php

use  App\Models\Agent;
use  App\Models\Commission;


if (!function_exists('getCommission')) {

    function getCommission($commission_code, $premium)
    {

        if (!empty($commission_code) && !empty($premium)) {
            $commission = Commission::where('commission_code', $commission_code)->get();
            if ($commission->count() === 1) {
                $commission = $commission->first();
                if ($commission->commission_type === 'fixed') {
                    return $commission->commission;
                } elseif ($commission->commission_type === 'percentage') {
                    $percentageCommission = ($commission->commission / 100) * ($premium - $premium * 0.1525);
                    return $percentageCommission;
                }
            }
        }
        return null;
    }
}
