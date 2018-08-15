<?php
$this->breadcrumbs=array(
	'Vessel Insurance Accruals'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Insurance Accrual Of Vessel ','url'=>array('vesselInsuranceAccrual/index')),
//array('label'=>'Create VesselInsuranceAccrual','url'=>array('create')),
);
?>

<div id="content">
<h2>Insurance Accrual Of Vessel</h2>
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
<?php echo CHtml::beginForm(array('vesselInsuranceAccrual/index'),'get'); ?>

    Year  <?php echo chtml::dropDownList('yearseacrh',$yearseacrh,Timeanddate::getlistyear(),array('class'=>'span2','style'=>'margin-bottom:0px;')); ?>
   
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
            'size'=>'small',
        )); ?>

  
<?php echo CHtml::endForm(); ?>

<?php
$existData = VesselInsuranceAccrual::model()->findAllByAttributes(array('year'=>$yearseacrh));
$totalData = count($existData);
?>

<?php if( $totalData ==0 ){ ?>
Copy Data From :
<?php echo CHtml::beginForm(array('vesselInsuranceAccrual/copyData'),'get'); ?>

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
        <th>Annual Accrued</th>
        <th>Monthly Accrued</th>
        <th>Action</th>
    </tr>
    </thead>
<?php
    $year = $yearseacrh; //Sementara di hardcode (Nanti diubah sama mas must biar dinamis)
    $LISTACCRUAL= VesselInsuranceAccrual::model()->findAllByAttributes(array('year'=>$year));
    $LIST_ACCRUAL_RESULT = array(); //ini untuk menampung hasil
    //Ubah dalam bentuk array agar pemroses jadi lebih cepat (tidak query berulang)
    foreach($LISTACCRUAL as $accrual){
        $LIST_ACCRUAL_RESULT[$accrual->id_vessel] = $accrual;
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
        
        if(isset($LIST_ACCRUAL_RESULT[$vessel->id_vessel])){
            //$totalData++;
            $accrual = $LIST_ACCRUAL_RESULT[$vessel->id_vessel];
            $monthaccrual = ($accrual->amount*1) /12;
            $url = Yii::app()->createUrl("vesselInsuranceAccrual/update", array('id_vessel'=>$vessel->id_vessel, 'year'=>$year));
            echo '
            <td>'.Yii::app()->numberFormatter->formatCurrency($accrual->amount,"").'</td>
            <td>'.Yii::app()->numberFormatter->formatCurrency($monthaccrual,"").'</td>
            <td><a href="'.$url.'">Update</a></td>
            ';
        }else{
            $url = Yii::app()->createUrl("vesselInsuranceAccrual/create", array('id_vessel'=>$vessel->id_vessel, 'year'=>$year));
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


































<?php 

/*
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vessel-insurance-accrual-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_vessel_insurance_accrual',
		'id_vessel',
		'year',
		'amount',
		'created_date',
		'created_user',
		/*
		'ip_user_updated',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("controller/update",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/view",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/delete",array("id"=>$data->class2id))',
                       
                    ),
                    ),
),
),
)); 

*/

?> 

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
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

