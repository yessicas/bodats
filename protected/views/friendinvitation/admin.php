<?php
$this->breadcrumbs=array(
	'Friend Invitations'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List FriendInvitation','url'=>array('index')),
array('label'=>'Create FriendInvitation','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('friend-invitation-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

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
<div class="well">
<h4>Manage Friend Invitations</h4>
<hr>
<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<!--
<p>
	Sebagai opsional anda dapat memasukkan operator perbandingan (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	atau <b>=</b>) pada awal dari masing-masing data pencarian Anda. 
</p>
-->
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<br><br>
<?php
$box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Manage  Friend Invitations',
        'headerIcon' => 'icon-home', // you can add icon boostrap
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
		/*
         'headerButtons' => array(

            array(
                'label' => '',//youre button
                'class' => 'bootstrap.widgets.TbButton',
                'icon'=>'',//youre icon
                'type' => 'primary',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'url'=>array('create'),'url'=>array('controler/action','param'=>'valueparam'),
                'htmlOptions' => array(
                                        'class'=>''
                                        ),
                
                
                ),
           
        )
		*/
   
    )
);

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'friend-invitation-grid',
'dataProvider'=>$model->search(),
//'type' => 'striped bordered condensed', 
//'summaryText'=>'',
//'enableSorting' => false,
//'htmlOptions'=>array('style'=>'font-size:12px;'),
//'afterAjaxUpdate' => 'reinstallDatePicker', 
'filter'=>$model,
'columns'=>array(
		/*
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		array(
            'header'=>'',
			'name'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::image(Yii::app()->baseUrl."/images/".$data->atribute,"alt",array("width"=>100,"height"=>100))',
			'value'=>'CHtml::link($data->atribute, Yii::app()->controller->createUrl("controler/action",
                                                array("id"=>$data->atribute )))',
            'htmlOptions'=>array('width'=>'100px')
			'filter'=>CHtml::listData(MyModel::model()->findAll(),'value', 'view value'),
			'filter'=>array('array1'=>'array1'),
        ),
		
		array('header'=>'','type'=>'raw',
			'value'=>function($data) {
			return ($data->atribute == "0") ? "text" : $data->atribut." "."text";
			},
			),
		// untuk combo box ajax di grid 
		 array('header'=>'Status','name'=>'status',
        'filter'=>array('REGISTER'=>'REGISTER', 'OPEN'=>'OPEN','BANNED'=>'BANNED','CLOSED'=>'CLOSED'),
        'type'=>'raw',
        'value'=>'CHtml::dropDownlist("status".$data->id_forum_topic,"",  array("REGISTER"=>"REGISTER", "OPEN"=>"OPEN","BANNED"=>"BANNED","CLOSED"=>"CLOSED"),array("style"=>"width:120px", "options" => array($data->status=>array("selected"=>true)),
        "id" => "status".$data->id_forum_topic, "ajax" => array("type"=>"POST", "url"=>Yii::app()->request->baseUrl."/forumtopic/update_status/id_forum_topic/".$data->id_forum_topic, "success"=>"allFine")))',
          ),
		 
		  array(
            'name' => 'attribute',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'attribute', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		
		array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'header' => 'Hak akses',
		'value' => 'CHtml::encode($data->ubahAkses())',
		'filter'=>array('1'=>'1', '2'=>'2'),
		),
		*/
		'id_invitation',
		'invitation_date',
		'is_user',
		'email_target',
		'userid_target',
		'status',
		/*
		'userid_sender',
		'ipaddress_sender',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
/*
'header'=>'',	
'htmlOptions'=>array('width'=>'50px', 'style'=>'text-align: center'),
'template'=>'{view}{update}{delete}',
'buttons'=>array(
                'update'=>
                    array(
						'label'=>'',
                    	'url'=> 'Yii::app()->createUrl("controler/action",array("id"=>$data->attribute))',
						'visible' => 'Yii::app()->user->hak_akses=="1"',
						'visible'=>'($data->userid_created == Yii::app()->user->id && $data->number_comment ==0  )',
						'imageUrl'=>Yii::app()->theme->baseUrl.'/css/print.jpg',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),
                  'view'=>
                    array(
						
						'url'=> 'Yii::app()->createUrl("controler/action",array("id"=>$data->attribute))',
                    	'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                    'delete'=>
                    array(
                    	'url'=> 'Yii::app()->createUrl("controler/action",array("id"=>$data->attribute))',
						'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),
                ),
*/
				
				

),
),
)); 

/*
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
*/

?>

<?php
$this->endWidget(); 
?>
