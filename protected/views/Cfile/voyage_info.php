<!-- voyage view -->
<style>
table#voyage_info th,  table#voyage_info td, table#voyage_info caption {
padding: 10px 10px 0px 5px ;
}
</style>

<div class="view">
<h4 style="color:#BD362F;">Voyage Info </h4>

<table id ="voyage_info">
<tr>
<td style="width:15%;">
Voyage Number
</td>
<td style="width:20%;">	
<?php echo Chtml::textField('voyageno',$modelvoyage->VoyageNumber,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

<td style="text-align:right;">
Vessel
</td>
<td style="width:20%;">	
<?php echo Chtml::textField('vtug',$modelvoyage->VesselTug->VesselName ,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

<td style="width:20%;">	
<?php echo Chtml::textField('vbarge',$modelvoyage->VesselBarge->VesselName ,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

</tr>

<tr>
<td>
Status
</td>
<td>	
<?php echo Chtml::textField('voyagest',$modelvoyage->status,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

<td style="text-align:right;">
Route
</td>
<td style="width:25%;">	
<?php echo Chtml::textField('ori',$modelvoyage->JettyOrigin->JettyName ,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

<td style="width:25%;">	
<?php echo Chtml::textField('end',$modelvoyage->JettyDestination->JettyName ,array('class'=>'span12','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

</tr>

</tr>

<tr>

<td>
Customer
</td>	

<td colspan='3'>	
<?php echo Chtml::textField('customer',$modelvoyage->Quotation->Customer->CompanyName ,array('class'=>'span10','readonly'=>'readonly','style'=>'margin-bottom:0px;padding-bottom:0px;padding-top:0px;')); ?>
</td>

</tr>

</table>


</div>

<!-- end voyage view -->