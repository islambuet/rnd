<?php

$config['status_active']=1;
$config['status_delete']=0;


//pagination config
$config['view_per_page']=15;
$config['links_per_page']=5;
//pagination config end

//15 days common config
$config['default_number_of_fifteen_days'] = 3;
$config['max_number_of_fifteen_days'] = 12;
$config['day_interval_15'] = 15;//hard coded at setup_image_15days need to check controller view and model to fix
//15 days common config end

//15 days text config
//crop fruit type config
$config['fruit_type'][1] = 'Fruit';
$config['fruit_type'][2] = 'Curd';
$config['fruit_type'][3] = 'Root';
$config['fruit_type'][4] = 'Leaf';
$config['fruit_type'][5] = 'Head';

//rating config
$config['rating'][3] = 3; // 'Poor';
$config['rating'][4] = 4; // 'Below Average';
$config['rating'][5] = 5; // 'Average';
$config['rating'][6] = 6; // 'Good';
$config['rating'][7] = 7; // 'Excellent';

$config['curd_Type_rating'][1] = 'Dome';
$config['curd_Type_rating'][2] = 'Semi-Dome';

$config['head_Type_rating'][1] = 'Round';
$config['head_Type_rating'][2] = 'Semi-Flat';
$config['head_Type_rating'][3] = 'Flat';

$config['root_Type_rating'][1] = 'Single';
$config['root_Type_rating'][2] = 'Auxiliary';

$config['leaf_Type_rating'][1] = 'Cherated';
$config['leaf_Type_rating'][2] = 'Partially Cherated';

$config['spine_type_rating'][1] = 'Blunt';
$config['spine_type_rating'][2] = 'Semi-Blunt';
$config['spine_type_rating'][3] = 'Pointed';
//15 days text config end


//year config
$config['start_year']=2014;
$config['next_year_range']=2;

//variety type config
$config['variety_type'][1] = 'PRINCIPAL';
$config['variety_type'][2] = 'CKA';
$config['variety_type'][3] = 'CKO';



//config for file upload and directory
$config['max_file_size'] = 1024*10;
$config['dir']['15_days_image_config'] = 'images/15_days_image_config';
$config['dir']['15_days_image_data'] = 'images/15_days_image_data';

$config['dir']['flowering_image_config'] = 'images/flowering_image_config';
$config['dir']['flowering_image_data'] = 'images/flowering_image_data';


$config['dir']['fruit_image_config'] = 'images/fruit_image_config';
$config['dir']['fruit_image_data'] = 'images/fruit_image_data';

$config['dir']['harvest cropwise_image_config'] = 'images/harvest cropwise_image_config';
$config['dir']['harvest cropwise_image_data'] = 'images/harvest cropwise_image_data';

// Flowering Config
$config['flowering_image'][1]='1st Flowering Pic';
$config['flowering_image'][2]='50% Flowering Pic';
$config['flowering_image'][3]='1st Fruit Setting Pic';
$config['flowering_image'][4]='1st Harvested Fruit';
$config['flowering_image'][5]='Last Harvested Fruit';
$config['flowering_image'][6]='Special Characters';

//setup fruit config
$config['fruit_image'][1]='Plot Picture';
$config['fruit_image'][2]='Plant Picture';
$config['fruit_image'][3]='Close %s Picture';
$config['fruit_image'][4]='Single %s Picture';

// setup hervest cropwise Config
$config['harvest cropwise_image'][1]='Harvested Normal Fruit';
$config['harvest cropwise_image'][2]='Harvested Abnormal Fruit';




//fix bellow config latter

//
//$config['variety_old_code']=0;
//$config['variety_new_code']=1;
//
//$config['sample_delivery_delivered_status_yes']=1;
//$config['sample_delivery_delivered_status_no']=0;
//$config['sample_delivery_received_status_yes']=1;
//$config['sample_delivery_received_status_no']=0;
//$config['sample_delivery_sowing_status_yes']=1;
//$config['sample_delivery_sowing_status_no']=0;
//
//$config['good']=1;
//$config['average']=2;
//$config['belowAverage']=3;
//
//$config['curd_type_dome']=1;
//$config['curd_type_semi_dome']=2;
//
//$config['accepted_code_yes']=1;
//$config['accepted_code_no']=0;
//
//$config['fruit_report_before_harvest']=1;
//$config['fruit_report_after_harvest_single']=2;
//$config['fruit_report_after_harvest_several']=3;
//$config['fruit_report_after_harvest_cut']=4;
//
//$config['fruit_report_before_harvest']=1;
//$config['fruit_report_after_harvest_single']=2;
//$config['fruit_report_after_harvest_several']=3;
//$config['fruit_report_after_harvest_cut']=4;
//
//$config['first_flowering_pic_code']='ffp';
//$config['fifty_percent_flowering_pic_code']='fpp';
//$config['first_fruit_setting_pic_code']='ffs';
//$config['first_harvested_fruit_code']='fhf';
//$config['last_harvested_fruit_code']='lhf';
//






