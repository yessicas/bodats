<!-- voyage view -->
<style>
table#voyage_info th,  table#voyage_info td, table#voyage_info caption {
padding: 10px 10px 0px 5px ;
}
</style>

<div class="view">
<h4 style="color:#BD362F;">Capacity Info </h4>

<table id ="voyage_info">
<tr>
<td style="width:15%;">
Capacity (Plan)
</td>
<td style="width:20%;">	
<?php echo Chtml::textField('Capacity',$modelvoyage->Capacity,array('class'=>'span12', 'readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

<td style="text-align:right;">
Capacity Actual (Based on Draft Survey)
</td>
<td style="width:20%;">	
<?php echo Chtml::textField('ActualCapacity',$modelvoyage->ActualCapacity ,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
<br>
<?php
$changeActualValue = CHtml::link(
	'Change Actual Capacity',
	 array('voyageclose/changeactualcapacity','id'=>$modelvoyage->id_voyage_order),
	 array('confirm_x' => 'Are you sure want to change actual capacity?', 'class'=>'various fancybox.ajax')
);
echo $changeActualValue;
?>

</td>



</tr>
</table>


</div>

<!-- end voyage view -->