<h4> Outlook <?php echo $outlook; ?> <font color="red"> - <?php echo $year; ?> </font></h4>


<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 12px;
}

th {
	font-weight: bold;
	color:white;
}

td{
	color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

[class^="icon-"], [class*=" icon-"] {

    margin: 1px 0px -1px 0px;
}

</style>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'reservation-inquiry-grid',
    'type' => 'striped bordered condensed',
    'summaryText'=>'',
    'dataProvider' => $arrayDataProvider,
    'columns' => array(
        array(
            'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),

        array( 
            'header'=>'Month',        
            'name' => 'Month',
            'type' => 'raw',
            'value' => 'CHtml::encode($data["Month"])'
        ),

        /*
         array( 
            'header'=>'Year',        
            'name' => 'Year',
            'type' => 'raw',
            'value' => 'CHtml::encode($data["Year"])'
        ),

        */

        array( 
            'header'=>'Total Voyage',     
            'name' => 'TotalVoyage',
            'type' => 'raw',
            'value' => 'SalesPlanDB::getcountSalesDBPerYear($data["id"], $data["Year"])', // id disini sama dengan month
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array( 
            'header'=>'Total Cost',      
            'name' => 'TotalCost',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalSalesCostPerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array( 
            'header'=>'Total Revenue',     
            'name' => 'TotalRevenue',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalRavenuePerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array(
            'header'=>'GP',
            'name' => 'GP',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalGPCOGSPerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
           
        ),
    ),
));

?>


<div class="form-actions" style="padding: 15px; margin: 0px 0px 0px 0px;">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
           // 'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'View Outlook '.$outlook,
           	 'url'=>array('masterbudget/masteroutlook','year'=>$year, 'outlook'=>$outlook),
        )); 
?>
	</div>

<?php //$this->endWidget(); ?>
