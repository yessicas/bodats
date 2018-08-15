<?php

$list_translate_left_menu = CHtml::listData(CpanelLeftmenu::model()->findAll(), 'value_eng', 'value_eng');

$list_translate = array(
// <--halaman utama--> //
'Welcome to' => 'Welcome to',
'a media and discussion forums to share information on education, employment,' =>'a media and discussion forums to share information on education, employment,',
'and job information that can make any person connected with the others.' => 'and job information that can make any person connected with the others.',
'please login here' => 'please login here',
'forgot password ?' => 'forgot password ?',
'want to join ?' => 'want to join ?',
'The combination of User ID and Password Wrong' => 'The combination of User ID and Password Wrong',
'Job Seekers' => 'Job Seekers',
'Company' => 'Company',
'University' => 'University',
'Register' => 'Register',
'Job Vacancy Info' => 'Job Vacancy Info',
'Social friends' => 'Social friends',
'Curiculum Vitae' => 'Curiculum Vitae',
'Post Job Vacancy' => 'Post Job Vacancy',
'Info Job Applicants' => 'Info Job Applicants',
'University Info' => 'University Info',
'Previously existing file with the name'=>'File Previously is Existing',
);

$alllist=array_merge($list_translate_left_menu, $list_translate);
return $alllist;
?>