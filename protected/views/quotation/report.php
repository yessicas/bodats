<style>
body {
    width:800px; 
    font-family: "Calibri";
    font-size: 13px;
}
</style>

<?php echo ReportViewDB::getlogoheader(); ?>

<h2 align ="center"> QUOTATION </h2>

<table width ="100%" class="tabel_border_o" style="margin-bottom:-20px">
<tr>

<td width ="70%" style="vertical-align:top;">
To : <br>
<?php 
echo '<font class="font_data_base">';
echo $model->Customer->CompanyName.'<br>';
echo $model->Customer->Address.'<br>';
if($model->Customer->Telephone != "")
	echo 'Phone : '.$model->Customer->Telephone.'<br>';

if($model->Customer->FaxNumber != "")
	echo 'Fax : '.$model->Customer->FaxNumber.'<br>';
	
if($model->Customer->Email != "")
	echo 'Email : '.$model->Customer->Email.'<br>';
	
echo 'Attn : '.$model->attn.'<br>';
echo '</font>';
?>
 </td>

<td width ="30%" style="vertical-align:top;">
<br>
<?php 
echo 'No : '.'<font class="font_data_base">'.$model->QuotationNumber.'</font>'.'<br>';
echo 'Date : '.'<font class="font_data_base">'.$model->QuotationDate.'</font>'.'<br>';
?>
</td>
              

</tr>
</table>


<br>
<br>

Dear Sir,  
<br>                             
Further to our disscusion  herewith we submit the price of Barging Coal by Tonnage for operation                                
at <?php echo GeneralDB::getFirstListQuotation($model->id_quotation)->JettyOrigin->JettyName ?> or  
<?php echo GeneralDB::getFirstListQuotation($model->id_quotation)->JettyDestination->JettyName ?>  with term & condition as follows :                             
<br>
<br>
<?php 
        $qdetail=GeneralDB::getListQuotations($model->id_quotation);
        echo'<table class="tabel_border_o" width ="80%">';
        echo'<tr>';
        echo'<td style="vertical-align:top;">';
        echo'<b>NO</b>';
        echo'</td>';
        echo'<td style="vertical-align:top;">';
        echo'<b>DESCRIPTION</b> <br> Base Freight Rate of :';
        echo'</td>';
        echo'<td style="vertical-align:top;">';
        echo'<b>PRICE / MT</b>';
        echo'</td>';
        echo'</tr>';

        $i=1;
        foreach($qdetail as $list_qdetail){
            echo'<tr>';
            echo'<td style="vertical-align:top;">'.$i.'</td>';
            echo'<td style="vertical-align:top;">';
            echo'<font class="font_data_base">Coal Barging '.$list_qdetail->JettyOrigin->JettyName.'-'.$list_qdetail->JettyDestination->JettyName.'</font><br>';
            echo'<font class="font_data_base">Barge Size : '.$list_qdetail->BargeSize.' Ft, Capacity : '.NumberAndCurrency::formatNumber($list_qdetail->Capacity).' MT </font>'; 
			
			
            echo'</td>';
            echo'<td style="vertical-align:top;">';
            echo'<font class="font_data_base">'.$list_qdetail->Currency->currency.' '.NumberAndCurrency::formatCurrency($list_qdetail->Price).'</font>';
            echo'</td>';
            echo'</tr>';
        $i++;
        }

        echo '</table>';
        echo'<br>';

?>

<?php


?>

<b>CONDITION :</b> <br>
<ol>
<li>Base Fuel  Price : Rp.  <?php echo NumberAndCurrency::formatCurrency(GeneralDB::getLastUpdateFuel()->fuel_price) ?> / Liter (standard harga Pertamina "Wilayah II"), price based on begining of the month.   </li>
<li>The Price Excluded Cost for "Alur Fee / channel fee" : <?php echo GeneralDB::getsettingQuotations('channel fee')->fiel_value?> </li>
<li>The Price Excluded <?php echo GeneralDB::getsettingQuotations('VAT Base Freight')->fiel_value ?>  VAT                        
    Base Freight  rate shall be adjust by Laytime used  as attached   </li>
<li>Payment Term : <?php echo GeneralDB::getsettingQuotations('Payment Term')->fiel_value ?>  from invoice date        
</li>
<li>Allowance Time for Loading, Discharging & waiting document (Laytime) : <?php echo GeneralDB::getsettingQuotations('Laytime')->fiel_value ?></li>
<li>Deadfreight : <?php echo '<font class="font_data_base">'.NumberAndCurrency::formatNumber(GeneralDB::getlastBigListQuotation($model->id_quotation)->Capacity).' MT '; ?> (<?php echo GeneralDB::getlastBigListQuotation($model->id_quotation)->BargeSize ?>  Ft Barge </font>)</li>
<li>Other :</li>

<ul>
<li>Total Cargo based on loading port draft survey</li>
<li>Assist tug provide by shipper</li>
<li>Cargo insurance shipper account</li>
<li>Validity of Quotation is <?php echo GeneralDB::getsettingQuotations('Validity of Quotation')->fiel_value ?>  from the date of this quotation</li>
</ul>
</ol>

Thank you for the opportunity to provide this quotation, should you have any inquiries please let us know.

<br>
<br>
<br>
<table width ="100%" class="tabel_border_o" style="margin-bottom:-20px">
<tr>

<td width ="70%" style="vertical-align:top;">
Best Regards

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php echo '<font class="font_data_base">'; ?>
<?php echo $model->SignName?><br>
<?php echo $model->SignPosition ?>
<?php echo '</font>'; ?>
</td>

<td width ="30%" style="vertical-align:top;">
<br>
<?php echo nl2br(GeneralDB::getsettingGeneral('Office Address')->field_value); ?>
</td>
               

</tr>
</table>