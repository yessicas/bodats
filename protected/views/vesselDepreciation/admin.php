<?php
/* @var $this VesselDepreciationController */
/* @var $model VesselDepreciation */

$this->breadcrumbs=array(
	'Vessel Depreciations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Vessel Depreciation', 'url'=>array('vesselDepreciation/index')),
);


?>

<div id="content">
<h2>Vessel Depreciation</h2>
<hr>

</div>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<div class="view">
<?php echo CHtml::beginForm(array('vesselDepreciation/index'),'get'); ?>

    Year  <?php echo chtml::dropDownList('yearseacrh',$yearseacrh,Timeanddate::getlistyear(),array('class'=>'span2','style'=>'margin-bottom:0px;')); ?>
   
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
			'size'=>'small',
        )); ?>

  
<?php echo CHtml::endForm(); ?>

<?php 
$existData = VesselDepreciation::model()->findAllByAttributes(array('year'=>$yearseacrh)); 
$totalData= count($existData);
?> 
<?php if( $totalData ==0 ){ ?>
Copy Data From :
<?php echo CHtml::beginForm(array('vesselDepreciation/copyData'),'get'); ?>

    Year  <?php echo chtml::dropDownList('yearseacrhcopy',$yearseacrh,Timeanddate::getlistyear(),array('class'=>'span2','style'=>'margin-bottom:0px;')); ?>
   		<?php echo chtml::hiddenField('yearseacrhasal',$yearseacrh) ; ?>

        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Copy',
			'size'=>'small',
        )); ?>

  
<?php echo CHtml::endForm(); ?>

<?php } ?>


</div>


<table class="items table table-striped table-bordered table-condensed">
	<thead>
	<tr>
		<th>No.</th>
		<th>Vessel Name</th>
		<th>Vessel Type</th>
		<th>Status</th>
		<th>Annual Depreciation</th>
		<th>Monthly Depreciation</th>
		<th>Action</th>
	</tr>
	</thead>
<?php
	$year = $yearseacrh; //Sementara di hardcode (Nanti diubah sama mas must biar dinamis)
	$LISTDEPRECIATION = VesselDepreciation::model()->findAllByAttributes(array('year'=>$year));
	$LIST_DEPRECIATION_RESULT = array(); //ini untuk menampung hasil
	//Ubah dalam bentuk array agar pemroses jadi lebih cepat (tidak query berulang)
	foreach($LISTDEPRECIATION as $depreciation){
		$LIST_DEPRECIATION_RESULT[$depreciation->id_vessel] = $depreciation;
	}

	$DATAVESSELS = VesselDB::getListVesselDefault();
	$no = 0;
	//$totalData=0;
	foreach($DATAVESSELS as $vessel){
		//echo $vessel->VesselName.'<br>';
		$no++;
		echo '
		<tr>
			<td>'.$no.'.</td>
			<td>'.$vessel->VesselName.'</td>
			<td>'.$vessel->VesselType.'</td>
			<td>'.$vessel->Status.'</td>';
		
		if(isset($LIST_DEPRECIATION_RESULT[$vessel->id_vessel])){
			//$totalData++;
			$depreciation = $LIST_DEPRECIATION_RESULT[$vessel->id_vessel];
			$monthdepreciation = ($depreciation->amount*1) /12;
			$url = Yii::app()->createUrl("vesselDepreciation/update", array('id_vessel'=>$vessel->id_vessel, 'year'=>$year));
			echo '
			<td>'.Yii::app()->numberFormatter->formatCurrency($depreciation->amount,"").'</td>
			<td>'.Yii::app()->numberFormatter->formatCurrency($monthdepreciation,"").'</td>
			<td><a href="'.$url.'">Update</a></td>
			';
		}else{
			$url = Yii::app()->createUrl("vesselDepreciation/create", array('id_vessel'=>$vessel->id_vessel, 'year'=>$year));
			echo '
			<td style ="font-style: italic;color:red">Unset</td>
			<td style ="font-style: italic;color:red">Unset</td>
			<td><a href="'.$url.'">Add</a></td>
			';
		}
		
		echo '
		</tr>
		';
	}
?>
</table>
