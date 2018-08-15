<?php
$this->breadcrumbs=array(
	'Forum Topics',
);

$this->menu=array(
array('label'=>'Create ForumTopic','url'=>array('create')),
array('label'=>'Manage ForumTopic','url'=>array('admin')),
);
?>

<center>
<h3 class= "header"><img src="repository/icon/chatbig.png"> <?php echo Yii::t('strings','Forum Topics') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<!-- <div class="well">
<h4><img src="repository/icon/chatbig.png"> <?php //echo Yii::t('strings','Forum Topics') ?></h4>
<hr>
</div>
-->

<!-- search-->
<script>
$(document).ready(function(){

$("#searchbotton").click(function(){
    var button = $("#q").val();
    if(button=='')
	{
        alert('Cannot Blank');
		return false;
	}

	else {
		return true;
	}
});

});
</script>
<!-- search-->

<div style ="float:right;">
<?php $url = Yii::app()->createUrl('forumtopic/search'); 
?>
<form class="navbar-search pull-left" action="<?php echo $url ?>" method='get'>
<input type="text" name ="q" class="search-query span9" id="q" placeholder=<?php echo Yii::t('strings','Search') ?>>
<button class="btn btn-primary" id="searchbotton" type="submit" name="yt0"><i class="icon-search icon-white"></i></button>
</form>
</div>


<?php /*$this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); */?>

<h4 class= "header" style="margin-left:5px; "> <img src="repository/icon/firebig.png" style="width:25px; height:25px; margin-bottom:5px;"> <?php echo Yii::t('strings','Top Forum') ?>
<span class="header-line"></span>
</h4>

<?php 
$this->widget('ext.EColumnListView.EColumnListView', array(
    'dataProvider' => $dataProvider,
    'afterAjaxUpdate' => 'reloaddata', 
    'summaryText'=>'',
    //'emptyText'=>'Tidak Ada Data ',
    'itemView' => '_view',
    'columns' => 2,
    'htmlOptions'=>array('style'=>'padding-top: 0px;'),
    /*
    'pager' => array(
         'htmlOptions'=>array('class'=>'pagination'),
         'header' => '',
        //'hiddenPageCssClass' => 'disabled',
        //'maxButtonCount' => 3,
        //'cssFile' => true,
        //'prevPageLabel' => '<i class="icon-chevron-left"></i>',
        //'nextPageLabel' => '<i class="icon-chevron-right"></i>',
        //'firstPageLabel' => 'First',
        //'lastPageLabel' => 'Last',
		//'prevPageLabel' => '<--',
       // 'nextPageLabel' => '-->',
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
		
    ),*/

)); ?>

<script>
function reloaddata(id, data) {
     
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

<h4 class= "header"> <?php echo Yii::t('strings','Other Forum') ?>
<span class="header-line"></span>
</h4>
<table>
	<tr>

		<td width=50% style="vertical-align:top;"> 

		<div class="view" style="height:480px;">

			<div  class="well" >
				<b><?php echo Yii::t('strings','Recent Forum') ?></b>
			</div>
			<?php  

			$jumlahdatarecentforum = count($recentrorum);  
			if( $jumlahdatarecentforum > 0){

					echo'<div class="view" style="height:300px;">';	
					    foreach($recentrorum as $list_recentrorum)
		              {
		              	  $modeluser=Users::model()->findByAttributes(array('userid'=>$list_recentrorum->userid_created));
		              	  echo'<table style="margin-bottom:0px;">';
						  echo'<tr>';


						  echo'<td style="vertical-align:top;width:50px;">';
						  echo'<div  style="width:50px;">';
						  echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluser->userid,'type'=>$modeluser->type));
						  echo'</div>';
						  echo'</td>';

						  echo'<td style="vertical-align:top;text-align:left;">';
						  echo '<b>'.CHtml::link($list_recentrorum->judul_topic,array('forumtopic/view','id'=>$list_recentrorum->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($list_recentrorum->code_id) )).'</b><br>';
    
						  echo '<font size=1>'.Yii::app()->dateFormatter->formatDateTime($list_recentrorum->created_date, 'medium').'</font><br>';
						  echo '<font size=1>'.Yii::t('strings','viewed').' : '.$list_recentrorum->viewed.' | '.Yii::t('strings','Comment').' : '.$list_recentrorum->number_comment.'</font><br>';
						  
						  echo'</td>';


						  echo '</tr>';
		           		 echo'</table>';
		              }
		        echo'</div>';    
		       // echo'<br>';
				echo'<p align="right" style="margin-top:-5px;">';
			    echo CHtml::link(Yii::t('strings','more..'),array('forumtopic/viewall'));
			    echo'</p>';
			    
			    
				}

			if( $jumlahdatarecentforum == 0){
				echo'<div class="view" style="height:300px;">';	
				echo "<center>".Yii::t('strings','Empty')."</center>";
				echo'</div>';
				echo'<br>';		
			}

			?>


		<?php 
		$this->widget('bootstrap.widgets.TbButton', array(
		            'type'=>'primary',
		            'size'=>'large',
		            'block'=>true,
		            'icon'=>'plus white',
		            'label'=>Yii::t('strings','Create New Forum'),
		            'url'=>array('forumtopic/create'),   
		        )); 
		?>

		</div>


		</td>


		 
		
		<td width=50% style="vertical-align:top;"> 

		<div class="view" style="height:480px;">

		<div  class="well" >
			<b><?php echo Yii::t('strings','Recent Comment') ?></b>
		</div>

		<?php
		$jumlahdatarecentcomment = count($recentcomment);  
		if( $jumlahdatarecentcomment > 0){

		echo'<div class="view" style="height:300px;">';	
		 foreach($recentcomment as $list_recentcomment)
		              {
		              	 $modeluser=Users::model()->findByAttributes(array('userid'=>$list_recentcomment->userid));
		              	 echo'<table style="margin-bottom:0px;">';
						  echo'<tr>';


						  echo'<td style="vertical-align:top;width:50px;">';
						  echo'<div  style="width:50px;">';
						  echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluser->userid,'type'=>$modeluser->type));
						  echo'</div>';
						  echo'</td>';

						  echo'<td style="vertical-align:top;text-align:left;">';
						  echo $this->renderPartial('../friend/list_data_nama_user', array('userid'=>$modeluser->userid,'type'=>$modeluser->type));
						  echo '<font size=2>'.Yii::t('strings','commented').' <b>'.CHtml::link($list_recentcomment->ForumTopic->judul_topic,array('forumtopic/view','id'=>$list_recentcomment->ForumTopic->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($list_recentcomment->ForumTopic->code_id) )).'</b>'."'<br>";
						  echo '<font size=2>'.$list_recentcomment->comment.'</font><br>';
						  //echo '<font size=1>viewed : '.$list_recentrorum->viewed.' | Comment : '.$list_recentrorum->number_comment.'</font><br>';
						  
						  echo'</td>';


						  echo '</tr>';
		           		 echo'</table>';
		              	
		              }
		             	echo'</div>';
		                echo'<br>';
		                echo'<br>';
		                echo'<br>';
		                echo'<p align="right" style="margin-top:-5px;">';
					    echo CHtml::link(Yii::t('strings','more..'),array('forumtopic/lastcomment'));
					    echo'</p>';

		          }
		 if( $jumlahdatarecentcomment == 0){
		 	echo'<div class="view" style="height:300px;">';	
		 	echo "<center>".Yii::t('strings','Empty')."</center>";
		 	echo'</div>';	
		 }

		?>

		</div>
		
		</td>

	</tr>
</table>


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