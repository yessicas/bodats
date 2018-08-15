
<style>

body {
    width:800px; 
    font-family: "Calibri";
    font-size: 12px;
    /*color: #4F6B72;*/
    color: black;
    
}

.grid-view table.items th {
border: 1px solid black !important;
}

.grid-view table.items th.blue {
border: 1px solid black !important;
}

</style>

<?php echo ReportViewDB::getlogoheader(); ?>
<div align='center'>
<font style='font-size:14px;font-weight:bold;'> OPERATION DESK (TIME SHEET) </font>
<hr>
</div>


<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 11px;width:100%;">

    <tr>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;width:70%;" >
        
        </td>
        <td style="width:2%;vertical-align:top;text-align:left;padding: 2px 0px;" >
         
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
       <?php echo $modelvoyage->VoyageNumber ?>
        </td>
       
    </tr>

    <tr>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        TUGBOAT & BARGE 
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
         : 
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        <?php echo $modelvoyage->VesselTug->VesselName.' - '.$modelvoyage->VesselBarge->VesselName ?>
        </td>
       
    </tr>

    <tr>
        
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        MV
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        :
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        <?php echo ($modelvoyage->Quotation->Mothervessel) ? $modelvoyage->Quotation->Mothervessel->MV_Name : '-'?>
        </td>
       
    </tr>

    <tr>
        
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        CARGO 
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        :
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        <?php echo NumberAndCurrency::formatNumber($modelvoyage->Capacity)." MT " ?>
        </td>
        
    </tr>


     <tr>
        
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
         
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        
        </td>
        
    </tr>


     <tr>
        
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        <?php echo $modelvoyage->Quotation->Customer->CompanyName ?>
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        
        </td>
        <td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
        <?php echo $modelvoyage->JettyOrigin->JettyName.' - '.$modelvoyage->JettyDestination->JettyName ?>
        </td>
        
    </tr>

    </table>



    <div class="grid-view" style="font-size:10px;padding-top:0px;">
    <table class="items table table-striped table-bordered table-condensed">
    <tbody>

    <tr class="even">
    <th  style="vertical-align:middle;text-align:left;width:74%;" colspan='2 ' class="blue">Voyage Number</th>
    <th  style="vertical-align:middle;text-align:center;width:20%;" class="blue"><?php echo $modelvoyage->VoyageNumber ?> </th>
    </tr class="even">

    <tr class="even">
    <th style="vertical-align:middle;text-align:center;width:5%;" class="blue">No</th>
    <th style="vertical-align:middle;text-align:left;width:70%;" class="blue">Activities</th>
    <th style="vertical-align:middle;text-align:center;width:20%;" class="blue">Date And Time</th>
    </tr>

    <tr class="even">
    <td  style="vertical-align:middle;text-align:center;width:5%;" >*****</td>
    <td  style="vertical-align:middle;text-align:left;width:70%;" ><b>BANJARMASIN</b></td>
    <td  style="vertical-align:middle;text-align:center;width:20%;"></td>
    </tr>


   
    <?php 
    $pi=1;
    foreach ($park as $park_list ) {
         echo' <tr class="even">';
         echo'<td style="vertical-align:middle;text-align:center;">'.$pi.'</td>';
         echo'<td style="vertical-align:middle;text-align:left;">'.$park_list->Activity.'</td>';
         echo'<td style="vertical-align:middle;text-align:right;">'.$park_list->StartDate.'</td>';
         echo'</tr>';
         $pi++;
      }
    ?>

    <tr class="even">
    <td  style="vertical-align:middle;text-align:center;width:5%;" >*****</td>
    <td  style="vertical-align:middle;text-align:left;width:65%;" ><b><?php echo $modelvoyage->JettyOrigin->JettyName ?></b> </td>
    <td  style="vertical-align:middle;text-align:center;width:30%;"></td>
    </tr>

    <?php 
    $si=$pi;
    foreach ($start as $start_list ) {
         echo' <tr class="even">';
         echo'<td style="vertical-align:middle;text-align:center;">'.$si.'</td>';
         echo'<td style="vertical-align:middle;text-align:left;">'.$start_list->Activity.'</td>';
         echo'<td style="vertical-align:middle;text-align:right;">'.$start_list->StartDate.'</td>';
         echo'</tr>';
         $si++;
      }
    ?>

    <tr class="even">
    <td  style="vertical-align:middle;text-align:center;width:5%;" >*****</td>
    <td  style="vertical-align:middle;text-align:left;width:65%;" ><b><?php echo $modelvoyage->JettyDestination->JettyName ?></b> </td>
    <td  style="vertical-align:middle;text-align:center;width:30%;"></td>
    </tr>

   <?php 
    $ei=$si;
    foreach ($end as $end_list ) {
         echo' <tr class="even">';
         echo'<td style="vertical-align:middle;text-align:center;">'.$ei.'</td>';
         echo'<td style="vertical-align:middle;text-align:left;">'.$end_list->Activity.'</td>';
         echo'<td style="vertical-align:middle;text-align:right;">'.$end_list->StartDate.'</td>';
         echo'</tr>';
         $ei++;
      }
    ?>

    <tr class="even">
    <th  style="vertical-align:middle;text-align:left;width:65%;" colspan='2 '>Mother Vessel</th>
    <th  style="vertical-align:middle;text-align:center;width:30%;"> <?php echo ($modelvoyage->Quotation->Mothervessel) ? $modelvoyage->Quotation->Mothervessel->MV_Name : '-'?></th>
    </tr>

    </tbody>
    </table>
    </div>






<div class="grid-view" style="font-size:10px;padding-top:0px;">
<table class="items table table-striped table-bordered table-condensed" style="width:35%;" >
<tbody>


<tr class="even">
<th  style="vertical-align:middle;text-align:left;width:70%;" class="blue">Resume</th>
<th  style="vertical-align:middle;text-align:center;width:30%;" class="blue">Hours</th>
</tr>


<?php 
$mstTimesheetSummary= MstTimesheetSummary::model()->findAllByAttributes(array('is_active'=>1));

foreach ($mstTimesheetSummary as $list_mstTimesheetSummary ) {
    $value=getDataSummary($modelvoyage->id_voyage_order, $list_mstTimesheetSummary->id_mst_timesheet_summary);
    echo '<tr class="even">
    <td style="vertical-align:middle;text-align:left;">'.$list_mstTimesheetSummary->timesheet_summary.'</td>
    <td style="vertical-align:middle;text-align:right;">'.$value.'</td>
    </tr>';
}

function getStatusSummary($id_voyage_order,$id_mst_timesheet_summary){

    $TimesheetSummary= TimesheetSummary::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'id_mst_timesheet_summary'=>$id_mst_timesheet_summary));
    if($TimesheetSummary){
        return true;
    }else{
        return false;
    }

}

function getDataSummary($id_voyage_order,$id_mst_timesheet_summary){

    $atatus=getStatusSummary($id_voyage_order,$id_mst_timesheet_summary);

    if($atatus){
       return $TimesheetSummary= TimesheetSummary::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'id_mst_timesheet_summary'=>$id_mst_timesheet_summary))->value;
    }else{
        return '0';
    }

}

?>



<?php /*
<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Sailing On Ballast Conditions </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Sailing On Loaded Conditions </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Waiting at  Loading Port </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Waiting at Trisakti Ballast</td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Waiting at Discharging Port </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Loading Time </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Discharging Time </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Loading Rate </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Discharging Rate </td>
<td style="vertical-align:middle;text-align:right;"> xx </td>
</tr>
*/
?>


</tbody>
</table>
</div>

<br>
<br>



    <table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 11px;" width='100%'>
                <tr>

            <td width ='50%' style='text-align:center;'>
<div align = 'cente'r>

Disusun Oleh <br>
<br>
<br>
<br>
<br>



<u>.................</u><br>
(PML)
</div>
        </td>

                <td width ='50%' style='text-align:center;'>
<div align = 'center'>

Disetujui Oleh <br>
<br>
<br>
<br>
<br>



<u>..................</u><br>
KPP
</div>

                </td>
        

            </tr>
</table>
