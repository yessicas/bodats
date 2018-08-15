
<!-- style tambahan harus di simpan di sisni agar mengoverride style yang sebelumnya-->
<style>
.input-large{
width:350px;
}
.deleteclass{
color:#cd5934;
margin-bottom:0px;
margin-left:-15px;
}
.value_comment{
margin-bottom:25px;
}
</style>
<!---->




<?php
$this->breadcrumbs=array(
	'Forum Topic'=>array('alltopic'),
	$model->judul_topic,
);

$this->menu=array(
array('label'=>'List ForumTopic','url'=>array('index')),
array('label'=>'Create ForumTopic','url'=>array('create')),
array('label'=>'Update ForumTopic','url'=>array('update','id'=>$model->id_forum_topic)),
array('label'=>'Delete ForumTopic','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_forum_topic),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ForumTopic','url'=>array('admin')),
);
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





<!-- view forum topic-->
<div class="well">
<h4><?php echo $model->judul_topic; ?> </h4>
	<hr>
</div>

<div class="view">
	<div id="foto" style="width:80px;">
	<?php
			
	$modeluserdatadiridefaultcoment=Users::model()->findByAttributes(array('userid'=>$model->userid_created));
	echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluserdatadiridefaultcoment->userid,'type'=>$modeluserdatadiridefaultcoment->type));
	echo"<br>";
	?>
	</div>
	<?php 
	echo $this->renderPartial('../friend/list_data_nama_user', array('userid'=>$modeluserdatadiridefaultcoment->userid,'type'=>$modeluserdatadiridefaultcoment->type));
	?>

	<p><span class="label label-info"><?php echo Yii::app()->dateFormatter->formatDateTime($model->created_date, 'medium'); ?></span></p>
	<p align ="justify"><?php echo $model->deskripsi?> </p>


<?php /*$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_forum_topic',
		//'id_forum_category',
		'judul_topic',
		'deskripsi',
		'status',
		'userid_created',
		'created_date',
		'ip_addr_created',
		'number_comment',
		'last_commented',
),
)); */?>
</div>
<!-- End view forum topic-->






<!-- view forum Comment-->

<?php 
 //$total_comment= $dataProvider->getTotalItemCount();
 $comment = ForumComment::model()->findAllByAttributes(array('id_forum_topic'=>$model->id_forum_topic,'userid'=>Yii::app()->user->id));
 $total_comment = count($comment);	
 $widget = $this->widget('bootstrap.widgets.TbListView',array(
'id'=>'commentlist', 
'loadingCssClass'=>'',
'afterAjaxUpdate' => 'reloadeditable', 
'dataProvider'=>$dataProvider,
'enableHistory' => true,
'emptyText'=>'<b>No Comments</b>',
'summaryText'=>'',
'itemView'=>'_view_comment',
)); 
Editable::attachAjaxUpdateEvent($widget); 

/*Yii::app()->clientScript->registerScript('reloadeditable', "
function reloadeditable(id, data) {
	if('$total_comment' == 0){
		location.reload();
	}

}
");*/
?>

<!-- fungsi script ketika di refresh-->
<script>
function reloadeditable(id, data) {
      
if(<?php echo $total_comment ?> == 0){
		location.reload();
	}

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
<!-- end fungsi script ketika di refresh-->




<!-- fungsi script ketika onload-->
<script>
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
</script>
<!-- end fungsi script ketika onload-->

<!--End  view forum Comment-->





<!-- script auto refresh ketika berhasil kirim comment -->
<script>
        function allFine(data) {
			
			//var x = data;
			//var y = '';
                // display data returned from action
                
				
				//if (x=='<div class="alert in alert-block fade alert-danger"><a href="#" class="close" data-dismiss="alert">x</a>Gagal Menyimpan Data, Periksa Lagi Inputan Yang Anda Masukan</div>')
				//{
				//$("#results").html(data);
				//}
				//else
				//{ 
				//$("#results").html(data);
				$("#ForumComment_comment").val('');
                // refresh your grid
                $.fn.yiiListView.update('commentlist', {   
			        data: $(this).serialize()
			    });
			    //$("#hapuscomment266").hide();
			     //location.reload();
				//}
			
			
				
        }
</script>	
<div id='results'>
</div>
<!-- End script auto refresh ketika berhasil kirim comment -->


<!-- script auto refresh per satu menit -->
<script type="text/javascript">
  setInterval(   // fungsi untuk menjalankan suatu fungsi berdasarkan waktu
    function(){
        $.fn.yiiListView.update('commentlist', {   
        data: $(this).serialize()
    });
     return false;
 }, 
 60000  // fungsi di eksekusi setiap 60 detik sekali
);
</script>
<!-- End script auto refresh per satu menit -->

<!-- script confirm delete comment -->
<script type="text/javascript">

 function deletecomment(id_forum_topic,c,id_forum_comment,currentPage)
   {
      var id_forum_comment = id_forum_comment;
      var c = c;
      var id_forum_topic = id_forum_topic;
      var currentPage = currentPage;
	    var text = "<?php echo Yii::t('strings','Are You Sure Delete This Data???')?>";
      var jawab;
 
      jawab = confirm(text)
      if(jawab)
      {
         //window.location = "forumtopic/deletecomment/id/"+id_forum_comment+"/id_forum_topic/"+id_forum_topic+"/c/"+c+"/currentPage/"+currentPage;
         jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/forumtopic/deletecomment/id/'+id_forum_comment+"/id_forum_topic/"+id_forum_topic+"/c/"+c+"/currentPage/"+currentPage,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
         return false;
      }
   }

</script>
<!-- End script confirm delete comment -->


<!-- script klik edit comment -->
<!--
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

	$('a#edit').click(function(e){    
       e.stopPropagation();
       var atreditable = 'a#'+ $(this).attr('editable');
	     //alert(atreditable);
       $(atreditable).editable('toggle');
       e.preventDefault();
});

});
/*]]>*/
</script>
-->






<!-- view forum Comment input-->
<table width="100%">
	<tr>
		<td width = "50" style="vertical-align:top;">
      <div id="foto" style="width:50px;">
		<?php
			
			$modeluserdatadiridefaultcoment=Users::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
			echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluserdatadiridefaultcoment->userid,'type'=>$modeluserdatadiridefaultcoment->type));
			
		?>
  </div>
		</td>
		<td style="vertical-align:top;text-align:left;">


		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'comment-form',
			'action'=> array('Forumtopic/addnewcomment'), 
			'enableAjaxValidation'=>true,
		    'clientOptions'=>array('validateOnSubmit'=>true),
		    'enableClientValidation'=>true,
		)); ?>

		<?php echo $form->hiddenfield($modelforumcoment,'id_forum_topic',array('value'=>$model->id_forum_topic)); ?>
		
		<?php echo $form->textArea($modelforumcoment,'comment',array('maxlength'=>1000,'rows'=>4, 'cols'=>50, 'class'=>'span12','placeholder'=>Yii::t('strings','Input Your Comment'))); ?>
		<br>
			<div align ="right">
		<?php		       
				echo CHtml::ajaxSubmitButton(Yii::t("strings","Send"), 
		         array('Forumtopic/addnewcomment'), 
		         array(
		              'data'=>'js:jQuery(this).parents("form").serialize()+
		                             "&request=added"',       
					  'success'=>'allFine',
					  // 'success'=>'js:function(data){
					   //$.fn.yiiGridView.update("hobi-grid");
					  //}', 
					  ),
		         array(
		              "id"=>$model->id_forum_topic,
		              //'name'=>'ajaxSubmitBtn',
		              'class'=>"btn btn-primary",
		         )); 
				?>
		<?php $this->endWidget(); ?>
			</div>



		</td>
	</tr>
</table>

<!--End  view forum Comment input-->



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


<!--
percobaan jangan dihapus
<?php
$this->widget(
    'bootstrap.widgets.TbEditableField',
    array(
        'type' => 'text',
        'mode' => 'inline',
        'model' => $model,
        'attribute' => 'judul_topic', // 
       	'url' => $this->createUrl('editable'),
       	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
       	'htmlOptions' => array(
           'id'=>'comment',
        ),
        'display' => 'js: function(value, sourceData) {
		  var escapedValue = $("<div>").text(value).html();
		  $(this).html("<font color=black>" + escapedValue + "</b>")
		}',
    )
);?>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

$('a#edit').click(function(e){    
       e.stopPropagation();
       $('a#comment').editable('toggle');
       e.preventDefault();
});

	});
/*]]>*/
</script>
<br>
<a id="edit" href="#" >Edit</a>
-->
<!--
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

jQuery('body').on('click','#yt0',function(){if(confirm('Anda Yakin Akan Menghapus Komentar Ini?')) 
	{jQuery.ajax({'success':allFine,'url':'/careerpath/forumtopic/deletecomment/id/72','cache':false});return false;} 
	else return false;});

});
/*]]>*/
</script>

<a href="#" id="yt0">Hapus</a>	
-->