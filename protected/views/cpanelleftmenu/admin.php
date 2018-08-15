<?php
$this->breadcrumbs=array(
	'Cpanel Leftmenus'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Cpanel Leftmenu','url'=>array('master/masleft')),
array('label'=>'Create Cpanel Leftmenu','url'=>array('master/masleftcreate')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cpanel-leftmenu-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Cpanel Leftmenus</h2>
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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'cpanel-leftmenu-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_leftmenu',
		//'id_parent_leftmenu',
		//'has_child',
		//'menu_name',
		//'menu_icon',
		'value_indo',
		
		'value_eng',
	//	'url',
        array(
                'header'=>'Visible',
                'name'=>'visible',
              //  'value'=>function($data) {
            //return ($data->Status == "1") ? "Used" : "Unused";
            //},
                'value'=>'CpanelLeftmenu::model()->status($data->visible)',
               'filter'=>array("1"=>"VISIBLE","0"=>"HIDE"),
               // 'filter'=>CHtml::listData(Owner::model()->findAll(),'id_owner', 'owner_name'),

              
            ),
		//'visible',
		'auth',
	
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("CpanelLeftmenu/update",array("id"=>$data->id_leftmenu))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("CpanelLeftmenu/view",array("id"=>$data->id_leftmenu))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("CpanelLeftmenu/delete",array("id"=>$data->id_leftmenu))',
                       
                    ),
                    ),
),
),
)); ?> 

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
        'width'       => 450,
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

