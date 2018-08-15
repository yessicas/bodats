<style>
body {
    width:800px; 
    font-family: "Calibri";
    font-size: 10px;
    /*color: #4F6B72;*/
    color:black;
    
}

.even .no_border{
	border-right: 1px solid #fff !important;
}
</style>

<?php echo $this->renderPartial('_report', array('model'=>$model,'modelquo'=>$modelquo)); ?>
