

<style>
table td, table th {
    padding: 3px 2px;
    text-align: left;
}

.alert-block {
    padding-top: 8px;
    padding-bottom: 8px;
    padding-right: 6px;
    margin-top: 5px;
}


</style>


<?php
$criteria = new CDbCriteria();
$criteria->condition = 'id_currency <> 1';
$curency=Currency::model()->findAll($criteria);
echo'<div class="view">';
echo'<h5 align="center"> Exchange Rate </h5>';
echo '<table>';

 foreach($curency as $list_curency){
 echo '<tr>';
 echo '<td>'.$list_curency->currency.'</td>';

 echo '<td>'.$list_curency->change_rate.' IDR </td>';
 echo '<td><a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("currency/updatecurrency/id/".$list_curency->id_currency).'"><i class="icon-pencil"></i></a></td>';
 echo '</tr>';
 }
 

echo '</table>';

echo '<div style=margin-top:-12px>';
echo '<font style="font-size:12px; color:#3E9FCC;">';
$criteria_update = new CDbCriteria();
$criteria_update->limit = 1;
$criteria_update->order = 'change_rate_updated desc';
$last_update=Currency::model()->find($criteria_update);
echo 'Last Update : '.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated, 'medium').' by '.$last_update->change_rate_updated_by;

echo'</font>';
echo'</div>';

$dt = new DateTime($last_update->change_rate_updated);
$date_last_update = $dt->format('Y-m-d');
if(date("Y-m-d") > $date_last_update){
echo'<div class="alert in alert-block fade alert-danger">
	Please immediately change the Exchange Rate, to avoid inacuracies.
	</div>';

}
echo'</div>';

?>



<?php
$criteriafuel = new CDbCriteria();
$fuel=Fuel::model()->findAll($criteriafuel);
echo'<div class="view">';
echo'<h5 align="center"> Fuel Price </h5>';
echo '<table>';

 foreach($fuel as $list_fuel){
 echo '<tr>';
 echo '<td>'.$list_fuel->fuel.'</td>';
 echo '<td>'.$list_fuel->fuel_price.' '.$list_fuel->Currency->currency.' </td>';
 echo '<td><a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("fuel/updatefuel/id/".$list_fuel->id_fuel).'"><i class="icon-pencil"></i></a></td>';
 echo '</tr>';
 }
 

echo '</table>';

echo '<div style=margin-top:-12px>';
echo '<font style="font-size:12px; color:#3E9FCC;">';
$criteria_update_fuel = new CDbCriteria();
$criteria_update_fuel->limit = 1;
$criteria_update_fuel->order = 'fuel_price_updated desc';
$last_update_fuel=Fuel::model()->find($criteria_update_fuel);
echo 'Last Update : '.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated, 'medium').' by '.$last_update_fuel->fuel_price_updated_by;

echo'</font>';
echo'</div>';

$dt_fuel = new DateTime($last_update_fuel->fuel_price_updated);
$date_last_update_fuel = $dt_fuel->format('Y-m-d');
if(date("Y-m-d") > $date_last_update_fuel){
echo'<div class="alert in alert-block fade alert-danger">
    Please immediately change the Fuel Price, to avoid inacuracies.
    </div>';

}
echo'</div>';

?>


<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 350,
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>
