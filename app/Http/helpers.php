<?php

use  App\Models\Agent;
use  App\Models\Commission;


if (!function_exists('getCommission')) {

    function getCommission($agent_id, $premium)
    {

        if (!empty($agent_id) && !empty($premium)) {
            $commission = Commission::where('agent_id', $agent_id)->get();
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
