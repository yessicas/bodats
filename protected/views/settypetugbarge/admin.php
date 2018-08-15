<?php
$this->breadcrumbs=array(
	'Settype Tugbarges'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Set Tug Barge','url'=>array('settypetugbarge/admin')),
//array('label'=>'Create Set type Tug barge','url'=>array('settypetugbarge/create'),'linkOptions'=>array('class'=>'various fancybox.ajax',)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('settype-tugbarge-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Set type Tug barge</h2>
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
if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
    ));
    ?>
</div>

<?php endif; ?>

<div class="search-form" style="display:inline;border: 0px solid #fff;margin: 0px 0;padding: 0px">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'settype-tugbarge-grid',
'type' => 'bordered',
'ajaxUpdate'=>false,
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id_settype_tugbarge',
		//'month',
		//'year',
		//'first_date',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         'voyage_number',

        array(  
                'name'=>'tug',
                'value'=>'$data->VesselTug->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                               'condition' => 'VesselType = :VesselType',
                               'params' => array(
                                   ':VesselType' => "TUG",
                               ),
                           )), 'id_vessel', 'VesselName'),
                ),
		//'tug',
		//'barge',
        array(  
                'name'=>'barge',
                'value'=>'$data->VesselBarge->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                               'condition' => 'VesselType = :VesselType',
                               'params' => array(
                                   ':VesselType' => "BARGE",
                               ),
                           )), 'id_vessel', 'VesselName'),
                ),
        'settype_name',
		'tug_power',
		'barge_capacity',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{update}{delete}',
 'buttons'=>array(
                'update'=>
                    array(
                        'options'=>array(
                           'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),
                    ),

),
),
)); ?> 



<?php
$totaldata=$model->search()->getItemCount();
//echo $totaldata;
        if(isset($_GET['SettypeTugbarge'])){
            $month=$_GET['SettypeTugbarge']['month'];
            $year=$_GET['SettypeTugbarge']['year'];
        }
        else{
            $month=ltrim(date("m"),'0');
            $year=date("Y");

        }


$criteria = new CDbCriteria();
$criteria->condition = 'month=:month AND year=:year';
$criteria->params = array(':month'=>$month,':year'=>$year);
$tugbarge=SettypeTugbarge::model()->findAll($criteria);
$allthismonthtotal_data=count($tugbarge);


if($totaldata==0&&$allthismonthtotal_data==0){
$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Copy From Prevoius Month'),
                        'icon'=>'share white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('settypetugbarge/clone','month'=>$month,'year'=>$year),
                        'htmlOptions' => array(
                                              // 'target'=>'_blank',
                                                ),
                    
                        )); 

}
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

