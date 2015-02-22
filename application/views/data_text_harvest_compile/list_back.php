<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /*$info = json_decode($variety_info['info'],true);
    $total_harvest = sizeof($harvest_data);

    function get_specific_array($harvest_data, $num)
    {
        foreach($harvest_data as $harvest)
        {
            if($harvest['harvest_no']==$num)
            {
                return $harvest;
            }
        }
        return null;
    }

    $first_harvest_array = get_specific_array($harvest_data, 1);
    $last_harvest_array = get_specific_array($harvest_data, $total_harvest);

    $first_harvest_data = json_decode($first_harvest_array['info'],true);
    $last_harvest_data = json_decode($last_harvest_array['info'],true);

    $first_harvesting_date_normal = $first_harvest_data['normal']['harvesting_date'];
    $first_harvesting_date_replica = $first_harvest_data['replica']['harvesting_date'];

    $last_harvesting_date_normal = $last_harvest_data['normal']['harvesting_date'];
    $last_harvesting_date_replica = $last_harvest_data['replica']['harvesting_date'];

    $interval_of_harvest_normal = abs((strtotime($last_harvesting_date_normal) - strtotime($first_harvesting_date_normal))/(60*60*24));
    $interval_of_harvest_replica = abs((strtotime($last_harvesting_date_replica) - strtotime($first_harvesting_date_replica))/(60*60*24));

    $sum_no_of_plants_normal = '';
    $sum_no_of_plants_replica = '';
    $sum_total_harvested_wt_normal = '';
    $sum_total_harvested_wt_replica = '';

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_plants_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_normal += $no_of_plants_normal;
        $sum_no_of_plants_replica += $no_of_plants_replica;

        $total_harvested_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_harvested_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_total_harvested_wt_normal += $total_harvested_wt_normal;
        $sum_total_harvested_wt_replica += $total_harvested_wt_replica;
    }*/

?>








