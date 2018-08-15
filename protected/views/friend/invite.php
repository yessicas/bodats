<?php
$this->breadcrumbs=array(
    'Friendships',
);
?>
<?php
?>


<center>
<h3 class= "header"><img src="repository/icon/invitebig.png"> <?php echo Yii::t('strings','Invite Friends') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!-- <div class="well">
<h4><img src="repository/icon/invitebig.png"> <?php //echo Yii::t('strings','Invite Friends') ?> </h4>
<?php //echo Yii::t('strings','You Can Invite Your Friends Here') ?>
<hr>
</div>
-->

<?php echo CHtml::link(Yii::t('strings','Invite By Email'),'#',array('class'=>'searchemailbtn btn btn-inverse btn-small')); ?>

<?php echo CHtml::link(Yii::t('strings','Search Friends'),'#',array('class'=>'searchfriendsbtn btn btn-inverse btn-small')); ?>
<br><br>



<!-- email search-->
<script>
function inputformdata(formdata){
  if (formdata.useremail.value == ""){
    alert("Anda belum mengisikan Data Data Email");
    formdata.useremail.focus();
    return (false);
  } 
  return (true);
}
  
 </script>

 <?php

Yii::app()->clientScript->registerScript('searchemail', "
$('.searchemailbtn').click(function(){
    $('.searchemail').toggle(300);
    return false;
});

$('.searchfriendsbtn').click(function(){
    $('.searchfriends').toggle(300);
    return false;
});

");

?>

 <?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
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




<div class="searchemail" style="display:none">


<h4> <img src="repository/icon/replybig.png" style="width:32px; height:30px; margin-left:5px;"> <?php echo Yii::t('strings','Invite By Email') ?></h4>


<div class="view">
<?php echo CHtml::beginForm(array('friend/createinvitation'),'post',array('name'=>'formdata','onSubmit'=>'return inputformdata(this)')); ?>
    
    <?php
    echo '<div class="alert alert-block alert-info">'.Yii::t('strings','Please Input Email Address You Will Invite').'</div>'."\n";
	?>
    
    <?php
   $this->widget(
    'bootstrap.widgets.TbSelect2',
    array(
        'asDropDownList' => false,
        'name' => 'useremail',
        //'model'=>$model,
        //'attribute'=>'resep_obat',
        'options' => array(
            'tags' => array(''),
             //'tags' =>  $myarray,
            'placeholder' =>Yii::t('strings','Input Email Here'),
            'width' => '100%',
            'tokenSeparators' => array(',', ' ')
        )
    )
);
?>
   
   
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>Yii::t('strings','Send'),
        )); ?>

    </div>
 </div>
<?php echo CHtml::endForm(); ?>

</div>

<!-- email search-->






<!-- search-->
<div class="searchfriends" style="display:none">

<h4> <img src="repository/icon/caribig.png" style="width:25px; height:25px; margin-left:5px;"> <?php echo Yii::t('strings','Search Friends') ?></h4>


<div class="view">
 <?php
    echo '<div class="alert alert-block alert-info">'.Yii::t('strings','Please Input Username').'</div>'."\n";
    ?>

<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle(300);
    return false;
});

$('.search-form form').submit(function(){

	if($('#Users_full_name').val() == ''){
      alert('Input Search Cannot Blank');
   }
	else{
    $.fn.yiiListView.update('userlistview', { 
        data: $(this).serialize()
    });
	}
    return false;
});
");

?>

<?php //echo CHtml::link('Pencarian','#',array('class'=>'search-button btn')); ?>
<div class="search-form">
<?php  $this->renderPartial('_search_user',array(
    'model'=>$model,
)); ?>
</div>

<!-- list view -->
<script>
        function allFine(data) {
          // $("#results").html(data);
          $.fn.yiiListView.update('userlistview', {   
			        data: $(this).serialize()
			    });
        }
</script>
<!--<div id='results'>...</div>-->
<div class="userlistviewall" style="display:none">
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'id'=>'userlistview', 
'enableHistory' => true,
'afterAjaxUpdate' => 'reloaddata', 
'itemView'=>'_view_user',
)); ?>

</div>
<!-- list view -->
<?php
/*
Yii::app()->clientScript->registerScript('reloaddata', "
function reloaddata(id, data) {
	 //$('.userlistviewall').show(300);

}
");
*/
?>
<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
     
     $(function () {

    var overPopup = false;

    $('[rel=popover]').popover({
        trigger: 'manual',
        placement: 'right'

    // replacing hover with mouseover and mouseout
    }).mouseover(function (e) {
        // when hovering over an element which has a popover, hide
        // them all except the current one being hovered upon
        $('[rel=popover]').not('#' + $(this).attr('id')).popover('hide');
        var $popover = $(this);
        $popover.popover('show');

        // set a flag when you move from button to popover
        // dirty but only way I could think of to prevent
        // closing the popover when you are navigate across
        // the white space between the two
        $popover.data('popover').tip().mouseenter(function () {
            overPopup = true;
        }).mouseleave(function () {
            overPopup = false;
            $popover.popover('hide');
        });

    }).mouseout(function (e) {
        // on mouse out of button, close the related popover
        // in 200 milliseconds if you're not hovering over the popover
        var $popover = $(this);
        setTimeout(function () {
            if (!overPopup) {
                $popover.popover('hide');
            }
        }, 200);
    });
});

}
</script>
</div>

</div>






<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
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

