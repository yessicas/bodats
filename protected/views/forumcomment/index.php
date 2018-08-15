<!-- halaman ini di panggil di controler forum topic-->
<?php
$this->breadcrumbs=array(
	'Forum Comments',
);

$this->menu=array(
array('label'=>'Create ForumComment','url'=>array('create')),
array('label'=>'Manage ForumComment','url'=>array('admin')),
);
?>

<center>
<h3 class= "header"><img src="repository/icon/commentbig.png"> <?php echo Yii::t('strings','Last Comments') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'afterAjaxUpdate' => 'reloaddata', 
//'summaryText'=>'',
'itemView'=>'../forumcomment/_view',
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