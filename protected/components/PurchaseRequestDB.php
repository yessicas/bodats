<?php

class PurchaseRequestDB {

    //Cara AKses : http://localhost/erppmlbucket/purchaserequest/prvessel/mode/survey_bunker
    // http://localhost/erppmlbucket/purchaserequest/admvessel/mode/survey_bunker
    public static function selectorModel($mode, $model, $crud = "") {
        switch ($mode) {
            case "bunkering":
                $model->dedicated_to = "VESSEL";
                $model->metric = "LTR";
                $model->id_po_category = 10100;

                break;

            case "survey_bunker":
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_po_category = 20202;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "fresh_water":
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_po_category = 10200;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "consumable_stock":
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_po_category = 10400;
                $model->is_mutliple_item = 1;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "ehs":
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_po_category = 10500;
                $model->is_mutliple_item = 1;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "rent_vessel":
                $model->dedicated_to = "VESSEL";
                $model->metric = "days";
                $model->id_po_category = 30000;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 30;
                    }
                }
                break;

            case "crew_mobilization":
                $model->TypePR = 'IM';
                $model->dedicated_to = "VESSEL";
                $model->metric = "person";
                $model->id_po_category = 20203;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "survey_class":
                $model->TypePR = 'PR';
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->is_mutliple_item = 1;
                $model->id_po_category = 20201;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                    }
                }
                break;

            case "agency":
                $model->TypePR = 'PR';
                $model->dedicated_to = "VOYAGE";

                $model->id_po_category = 20100;
                $model->is_mutliple_item = 1;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                        $model->metric = "packet";
                    }
                }
                break;

            case "service":
                $model->TypePR = 'PR';
                $model->dedicated_to = "VESSEL";

                $model->id_po_category = 20400;
                $model->is_mutliple_item = 1;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                        $model->metric = "packet";
                    }
                }
                break;

            case "transport_fuel":
                $model->TypePR = 'PR';
                $model->dedicated_to = "OTHERS";

                $model->id_po_category = 21300;
                //$model->is_mutliple_item = 1;
                if ($crud == "create") {
                    if ($model->isNewRecord) {
                        $model->amount = 1;
                        $model->metric = "LTR";
                    }
                }
                break;
			
			case "ehs":
				$model->dedicated_to = "VESSEL";
				$model->metric = "packet";
				$model->id_po_category = 10403;
				$model->is_mutliple_item = 1;
				if($crud == "create"){
					if($model->isNewRecord){
						$model->amount = 1;
						$model->metric = "packet";
					}
				}
				break;			
				
        }
        return $model;
    }

    public static function getPRCategory() {
        /* Data ini harus disesuaikan dengan bagian yang atas */
        return array(
            '10100' => PurchaseRequestDB::getPOCategoryName('10100'),
            '20202' => PurchaseRequestDB::getPOCategoryName('20202'),
            '10200' => PurchaseRequestDB::getPOCategoryName('10200'),
            '10400' => PurchaseRequestDB::getPOCategoryName('10400'),
            '10500' => PurchaseRequestDB::getPOCategoryName('10500'),
            //'10401'=>PurchaseRequestDB::getPOCategoryName('10401'),
            '20203' => PurchaseRequestDB::getPOCategoryName('20203'),
            '20201' => PurchaseRequestDB::getPOCategoryName('20201'),
            '20100' => PurchaseRequestDB::getPOCategoryName('20100'),
        );
    }

    public static function getPRFilterByMode($model, $mode) {
        if ($mode != "") {
            switch ($mode) {
                case "fuel":
                    $model->id_po_category = '10100'; // Ini terkait untuk fuel
                    break;

                case "fresh_water":
                    $model->id_po_category = '10200'; // Ini terkait untuk fuel
                    break;

                case "agency":
                    $model->id_po_category = '20100'; // Ini terkait untuk fuel
                    break;

                case "cs_part_asset":
                    $model->id_po_category = '10400'; // Ini terkait untuk consumable stock
                    break;

                case "ehs":
                    $model->id_po_category = '10500'; // Ini terkait untuk ehs
                    break;

                case "survey":
                    $model->id_po_category = '20201'; // Ini terkait untuk consumable stock
                    break;

                case "rent":
                    $model->id_po_category = '30000'; // Ini terkait untuk consumable stock
                    break;

                case "service":
                    $model->id_po_category = '20400'; // Ini terkait untuk service
                    break;

                case "transport_fuel":
                    $model->id_po_category = '21300'; // Ini terkait untuk service
                    break;
					
				case "ehs":
					$model->id_po_category='10403'; // Ini terkait untuk consumable stock
					break;
            }
        }

        return $model;
    }

    public static function getPOCategoryName($id_po_category) {
        return PoCategory::model()->findByAttributes(array('id_po_category' => $id_po_category))->category_name;
    }

    public static function getStatusPRFromVO($id_voyage_order) {
        $model = PurchaseRequest::model()->findByAttributes(array('id_voyage_order' => $id_voyage_order));
        if (!empty($model))
            return "created";
        else
            return "uncreated";
    }

    public static function getDedicatedTo($prmodel) {
        if ($prmodel->dedicated_to == "VESSEL") {
            $id_vessel = $prmodel->id_vessel;
            $ves = Vessel::model()->findByPk($id_vessel);
            if ($ves != null) {
                return "(" . $ves->VesselName . ")";
            }
        }
        if ($prmodel->dedicated_to == "VOYAGE") {
            $id_voyage_order = $prmodel->id_voyage_order;
            $vo = VoyageOrder::model()->findByPk($id_voyage_order);
            if ($vo != null) {
                return "(" . $vo->VoyageOrderNumber . ")";
            }
        }

        return "";
    }

    public static function getDedicatedToVesselOrVoyage($prmodel) {
        if ($prmodel->dedicated_to == "VESSEL") {
            $id_vessel = $prmodel->id_vessel;
            $ves = Vessel::model()->findByPk($id_vessel);
            if ($ves != null) {
                return $ves->VesselName;
            }
        }
        if ($prmodel->dedicated_to == "VOYAGE") {
            $id_voyage_order = $prmodel->id_voyage_order;
            $vo = VoyageOrder::model()->findByPk($id_voyage_order);
            if ($vo != null) {
                return $vo->VoyageOrderNumber;
            }
        }

        return "";
    }

    public static function getDedicatedToVesselOrVoyageFromPO($po) {
        if (isset($po->PurchaseRequest)) {
            $prmodel = $po->PurchaseRequest;
            if ($prmodel->dedicated_to == "VESSEL") {
                $id_vessel = $prmodel->id_vessel;
                $ves = Vessel::model()->findByPk($id_vessel);
                if ($ves != null) {
                    return $ves->VesselName;
                }
            }
            if ($prmodel->dedicated_to == "VOYAGE") {
                $id_voyage_order = $prmodel->id_voyage_order;
                $vo = VoyageOrder::model()->findByPk($id_voyage_order);
                if ($vo != null) {
                    return $vo->VoyageOrderNumber;
                }
            }
        } else {
            //Bagian ini mencoba mencari tahu jika tidak ketemu maka yang diambil adalah id_purchase_request_detail
            $id_purchase_request = $po->id_purchase_request;
            if ($id_purchase_request > 0) {
                $prdet = PurchaseRequestDetail::model()->findByPk($id_purchase_request);
                if ($prdet != null) {
                    if (isset($prdet->PurchaseRequest)) {
                        $id_vessel = $prdet->PurchaseRequest->id_vessel;
                        $ves = Vessel::model()->findByPk($id_vessel);
                        if ($ves != null) {
                            return $ves->VesselName;
                        }
                    }
                }
            }
        }

        return "---";
    }

    public static function getItemDetailPR($modeldetails) {
        switch ($modeldetails->purchase_item_table) {
            case "AgencyItem":
                $item = AgencyItem::model()->findByAttributes(array('id_agency_item' => $modeldetails->id_item));
                if ($modeldetails->item_add_info != "")
                    return $item->agency_item . " (" . $modeldetails->item_add_info . ")";
                else
                    return $item->agency_item;

            case "ServiceItem":
                $item = ServiceItem::model()->findByAttributes(array('id_service_item' => $modeldetails->id_item));
                if ($modeldetails->item_add_info != "")
                    return $item->service_item . " (" . $modeldetails->item_add_info . ")";
                else
                    return $item->service_item;

            case "SurveyItem":
                $item = SurveyItem::model()->findByAttributes(array('id_survey_item' => $modeldetails->id_item));
                if ($modeldetails->item_add_info != "")
                    return $item->survey_item_name . " (" . $modeldetails->item_add_info . ")";
                else
                    return $item->survey_item_name;

            case "ConsumableStockItem":
                $item = ConsumableStockItem::model()->findByAttributes(array('id_consumable_stock_item' => $modeldetails->id_item));
                if ($modeldetails->item_add_info != "")
                    return PurchaseRequestDB::getCSItemDetail($item) . " (" . $modeldetails->item_add_info . ")";
                else
                    return PurchaseRequestDB::getCSItemDetail($item);
				

            case "EhsItem":
                $item = EhsItem::model()->findByAttributes(array('id_ehs_item' => $modeldetails->id_item));
                if ($modeldetails->item_add_info != "")
                    return PurchaseRequestDB::getEHSItemDetail($item) . " (" . $modeldetails->item_add_info . ")";
                else
                    return PurchaseRequestDB::getEHSItemDetail($item);

            case "single":
                $po_category = PoCategory::model()->findByAttributes(array('id_po_category' => $modeldetails->id_po_category));
                if ($modeldetails->item_add_info != "")
                    return $po_category->category_name . " (" . $modeldetails->item_add_info . ")";
                else
                    return $po_category->category_name;
        }
    }

    public static function getCSItemDetail($item) {
        $res = "";
        if ($item != null) {
            $res = $item->consumable_stock_item;
            if ($item->serial_number != "") {
                $res .= ' | Ser.Num: ' . $item->serial_number;
            }
            if ($item->impa != "") {
                $res .= ' | IMPA: ' . $item->impa;
            }
            if ($item->description != "") {
                $desc = str_replace(array("\r", "\n"), "", $item->description);
                $res .= ' | Desc: ' . $desc;
            }
        }

        return $res;
    }

    public static function getEHSItemDetail($item) {
        $res = "";
        if ($item != null) {
            $res = $item->ehs_item;
            if ($item->serial_number != "") {
                $res .= ' | Ser.Num: ' . $item->serial_number;
            }
            if ($item->impa != "") {
                $res .= ' | IMPA: ' . $item->impa;
            }
            if ($item->description != "") {
                $desc = str_replace(array("\r", "\n"), "", $item->description);
                $res .= ' | Desc: ' . $desc;
            }
        }

        return $res;
    }

    public static function getDetailPurchaseRequest($id_purchase_request) {
        //Dibuat Model text agar ke depan kalau bisa dimerge dengan email jadi lebih mudah.
        $model = PurchaseRequest::model()->findByAttributes(array('id_purchase_request' => $id_purchase_request));
        $RES = "";
        if (!empty($model)) {
            $RES .= 'PR.Number : ' . $model->PRNumber . "\r\n";
            $RES .= 'PR.Date : ' . Yii::app()->dateFormatter->formatDateTime($model->PRDate, "long", "") . "\r\n";
            $RES .= 'PR.Category : ' . $model->PoCategory->category_name . "\r\n";
            if ($model->is_mutliple_item == 0)
                $RES .= 'Quantity : ' . $model->amount . " " . $model->MetricPr->metric_name . "\r\n";

            $RES .= "\r\n" . 'Related To : ' . "\r\n";
            if ($model->dedicated_to == "VESSEL") {
                $RES .= 'Vessel : ' . $model->Vessel->VesselName . "\r\n";
            }

            if ($model->dedicated_to == "VOYAGE") {
                //$RES .= 'Vessel : '.$model->Vessel->VesselName."\r\n";
                //$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$model->id_voyage_order));
                $RES .= VoyageOrderDisplayer::displayVoyageInfoTextBased($model->id_voyage_order);
            }

            //Detai Item
            if ($model->is_mutliple_item == 1) {
                $details = PurchaseRequestDetail::model()->findAllByAttributes(array('id_purchase_request' => $model->id_purchase_request));
                $RES .= "\r\n" . 'Detail Item : ' . "\r\n";
                $no = 0;
                foreach ($details as $detail) {
                    $no++;
                    $RES .= $no . "). " . PurchaseRequestDB::getItemDetailPR($detail) . " - Qty." . $detail->quantity . " " . $detail->metric . "\r\n";
                }
            }

            $RES .= "\r\n" . 'Notes : ' . "\r\n" . $model->notes . " " . $model->MetricPr->metric_name . "\r\n\r\n";

            $userreq = Users::model()->findByAttributes(array('userid' => $model->requested_user));
            $RES .= 'Requested By : ' . $model->requested_user . " (" . $userreq->full_name . ") at " . Yii::app()->dateFormatter->formatDateTime($model->requested_date, "long", "medium") . "\r\n";
        }

        return $RES;
    }

    public static function getItemDetailPRTableVersion($modeldetails) {
        $RES = "";

        switch ($modeldetails->purchase_item_table) {
            case "AgencyItem":
                $item = AgencyItem::model()->findByAttributes(array('id_agency_item' => $modeldetails->id_item));
                if ($item != null)
                    $RES .= "<td>" . $item->agency_item . "</td>";
                else
                    $RES .= "<td>Item not found [" . $modeldetails->id_item . "]</td>";

                return $RES;

            case "ConsumableStockItem":
                $item = ConsumableStockItem::model()->findByAttributes(array('id_consumable_stock_item' => $modeldetails->id_item));
                if ($item != null) {
                    $RES .= "<td>" . $item->consumable_stock_item . "</td>";
                    $RES .= "<td>" . $item->serial_number . "</td>";
                    $RES .= "<td>" . $item->impa . "</td>";
                    $RES .= "<td>" . $item->description . "</td>";
                } else {
                    $RES .= "<td>Item not found [" . $modeldetails->id_item . "]</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                }

                return $RES;

            case "EhsItem":
                $item = EhsItem::model()->findByAttributes(array('id_ehs_item' => $modeldetails->id_item));
                if ($item != null) {
                    $RES .= "<td>" . $item->ehs_item . "</td>";
                    $RES .= "<td>" . $item->serial_number . "</td>";
                    $RES .= "<td>" . $item->impa . "</td>";
                    $RES .= "<td>" . $item->description . "</td>";
                } else {
                    $RES .= "<td>Item not found [" . $modeldetails->id_item . "]</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                    $RES .= "<td>-</td>";
                }

                return $RES;

            case "single":
                $po_category = PoCategory::model()->findByAttributes(array('id_po_category' => $modeldetails->id_po_category));
                if ($modeldetails->item_add_info != "")
                    return $po_category->category_name . " (" . $modeldetails->item_add_info . ")";
                else
                    return $po_category->category_name;

            case "ServiceItem":
                $item = ServiceItem::model()->findByAttributes(array('id_service_item' => $modeldetails->id_item));
                if ($item != null) {
                    $RES .= "<td>" . $item->service_item . "</td>";
                    //	$RES .= "<td>".$item->description."</td>";
                } else {
                    $RES .= "<td>Item not found [" . $modeldetails->id_item . "]</td>";
                }

                return $RES;

            case "SurveyItem":
                $item = SurveyItem::model()->findByAttributes(array('id_survey_item' => $modeldetails->id_item));
                if ($item != null) {
                    $RES .= "<td>" . $item->survey_item_name . "</td>";
                    //	$RES .= "<td>".$item->description."</td>";
                } else {
                    $RES .= "<td>Item not found [" . $modeldetails->id_item . "]</td>";
                }

                return $RES;
        }
    }

    public static function getTablePRViewHeader($modeldetails) {
        $RES = '
		<table class="items table table-striped table-bordered table-condensed">
				<thead><tr>
				<th>No</th>
				<th>Item Name</th>
				<th>Qty</th>
				<th>Unit</th>
				</tr>
				</thead>
		';

        switch ($modeldetails->purchase_item_table) {
            case "AgencyItem":
                //$RES = "";
                break;

            case "ConsumableStockItem":
                $RES = '
				<table class="items table table-striped table-bordered table-condensed">
				<thead><tr>
				<th>No</th>
				<th>Part Name</th>
				<th>Serial Number</th>
				<th>IMPA</th>
				<th>Desc</th>
				<th>Qty</th>
				<th>Unit</th>
				</tr>
				</thead>

				';
                break;

            case "EhsItem":
                $RES = '
				<table class="items table table-striped table-bordered table-condensed">
				<thead><tr>
				<th>No</th>
				<th>Part Name</th>
				<th>Serial Number</th>
				<th>IMPA</th>
				<th>Desc</th>
				<th>Qty</th>
				<th>Unit</th>
				</tr>
				</thead>

				';
                break;

            case "single":
                //$RES = "";
                break;
        }

        return $RES;
    }

    public static function getDetailPurchaseRequestTableVersion($id_purchase_request) {
        //Dibuat Model text agar ke depan kalau bisa dimerge dengan email jadi lebih mudah.
        $model = PurchaseRequest::model()->findByAttributes(array('id_purchase_request' => $id_purchase_request));
        $RES = "";
        if (!empty($model)) {
            $RES .= 'PR.Number : ' . $model->PRNumber . "<br>";
            $RES .= 'PR.Date : ' . Yii::app()->dateFormatter->formatDateTime($model->PRDate, "long", "") . "<br>";
            $RES .= 'PR.Category : ' . $model->PoCategory->category_name . "<br>";
            if ($model->is_mutliple_item == 0)
                $RES .= 'Quantity : ' . $model->amount . " " . $model->MetricPr->metric_name . "<br>";

            $RES .= "<br>" . '<span style="font-weight: bold;">Related To :</span>' . "<br>";
            if ($model->dedicated_to == "VESSEL") {
                $RES .= 'Vessel : ' . $model->Vessel->VesselName . "<br>";
            }

            if ($model->dedicated_to == "VOYAGE") {
                //$RES .= 'Vessel : '.$model->Vessel->VesselName."<br>";
                //$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$model->id_voyage_order));
                $RES .= nl2br(VoyageOrderDisplayer::displayVoyageInfoTextBased($model->id_voyage_order));
            }

            //Detai Item
            if ($model->is_mutliple_item == 1) {
                $details = PurchaseRequestDetail::model()->findAllByAttributes(array('id_purchase_request' => $model->id_purchase_request));
                $RES .= "<br>" . 'Detail Item : ' . "<br>";

                $no = 0;
                foreach ($details as $detail) {
                    $no++;
                    if ($no == 1) {
                        $RES .= PurchaseRequestDB::getTablePRViewHeader($detail);
                    }
                    $RES .= "<tr>";
                    $RES .= "<td>" . $no . "</td>";
                    $RES .= PurchaseRequestDB::getItemDetailPRTableVersion($detail);
                    $RES .= "<td>" . $detail->quantity . "</td>";
                    $RES .= "<td>" . $detail->metric . "</td>";
                    //$RES .= PurchaseRequestDB::getItemDetailPRTableVersion($detail)." - Qty.".$detail->quantity." ".$detail->metric."<br>";
                    $RES .= '</tr>';
                }

                if ($no > 0) {
                    $RES .= '</table>';
                }
            }

            $RES .= "<br>" . '<span style="font-weight: bold;">Notes : </span>' . "<br>" . $model->notes . " " . $model->MetricPr->metric_name . "<br><br>";

            $userreq = Users::model()->findByAttributes(array('userid' => $model->requested_user));
            $RES .= '<span style="font-weight: bold;">Requested By :</span> ' . $model->requested_user . " (" . $userreq->full_name . ") at " . Yii::app()->dateFormatter->formatDateTime($model->requested_date, "long", "medium") . "<br>";
        }

        return $RES;
    }

    public static function getLeadTime($PRdate, $datenow) {
        $date1 = $PRdate;
        $date2 = $datenow;
        //$date2='2014-12-10';
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $difference = $datetime1->diff($datetime2);

        if ($datetime2 < $datetime1) {
            return '-';
        } else {
            $data = $difference->d;
            return $data;
        }
    }

    public static function getLeadTimeColor($PRdate, $datenow) {

        $return = '';
        $data = PurchaseRequestDB::getLeadTime($PRdate, $datenow);
        //$data=4;
        if ($data == 1) {
            $return = 'oneday';
        } else if ($data >= 2 && $data <= 3) {
            $return = 'twothreeday';
        } else if ($data > 3) {
            $return = 'morethreeday';
        } else {
            $return = '-';
        }

        return $return;
    }

    public static function getLeadTimeColorbyDataDB($lateData) {

        $return = '';
        $data = $lateData;
        //$data=4;
        if ($data == 1) {
            $return = 'oneday';
        } else if ($data >= 2 && $data <= 3) {
            $return = 'twothreeday';
        } else if ($data > 3) {
            $return = 'morethreeday';
        } else {
            $return = '-';
        }

        return $return;
    }

    public static function countRangeDataByDB($startdate, $endate) {
        $date1 = $startdate;
        $date2 = $endate;
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $difference = $datetime1->diff($datetime2);

        if ($datetime2 < $datetime1) {
            return 0;
        } else {
            return $difference->days;
        }
    }

    public static function cloneDuplicatePRtoDetail($modelpr, $mode) {
        $model = new PurchaseRequestDetail;

        $model->id_purchase_request = $modelpr->id_purchase_request;
        $model->purchase_item_table = $mode;
        $model->quantity = $modelpr->amount;
        $model->metric = $modelpr->metric;
        $model->dedicated_to = $modelpr->dedicated_to;
        $model->id_vessel = $modelpr->id_vessel;
        //$model->id_voyage_order = $modelpr->id_voyage_order;
        $model->id_voyage_order = 0;
        $model->notes = $modelpr->notes;
        $model->id_po_category = $modelpr->id_po_category;
        $model->requested_user = $modelpr->requested_user;
        $model->requested_date = $modelpr->requested_date;
        $model->ip_user_requested = $modelpr->ip_user_requested;
        $model->status = "PR";
        $model->id_item = 0;
        $model->attachment = 'tempName';

        $datetime_now = date("YmdHis");
        if (strlen(trim(CUploadedFile::getInstance($model, 'attachment'))) > 0) {
            $models = CUploadedFile::getInstance($model, 'attachment');
            $extension = $models->extensionName;
            $model->attachment = ($model->id_purchase_request) . $datetime_now . '.' . $extension;
            $filename = md5($model->id_purchase_request) . $datetime_now;
            $path = Yii::app()->basePath . '/../repository/prdetail/' . $filename . '.' . $extension;
            $models->saveAs($path);
        }


        if ($model->validate()) {
            if ($model->save()) {
                //echo "Save Success!"; exit();
                return $model;
            } else {
                //echo "Save Failed!";
                return false;
            }
        } else {
            //echo "validate fail";
            echo CHtml::errorSummary($model);
            exit();
            return false;
        }
    }

    public static function cloneDuplicatePRtoDetailUpdate($modelpr, $mode) {
        $model = PurchaseRequestDetail::model()->findByAttributes(array('id_purchase_request' => $modelpr->id_purchase_request));

        //$model->id_purchase_request = $modelpr->id_purchase_request;
        $model->purchase_item_table = $mode;
        $model->quantity = $modelpr->amount;
        $model->metric = $modelpr->metric;
        $model->dedicated_to = $modelpr->dedicated_to;
        $model->id_vessel = $modelpr->id_vessel;
        //$model->id_voyage_order = $modelpr->id_voyage_order;
        $model->id_voyage_order = 0;
        $model->notes = $modelpr->notes;
        $model->id_po_category = $modelpr->id_po_category;
        $model->requested_user = $modelpr->requested_user;
        $model->requested_date = $modelpr->requested_date;
        $model->ip_user_requested = $modelpr->ip_user_requested;
        $model->status = "PR";
        $model->id_item = 0;


        if ($model->attachment == '') {
            $model->attachment = 'tempName';
        }

        $datetime_now = date("YmdHis");
        if (strlen(trim(CUploadedFile::getInstance($model, 'attachment'))) > 0) {
            if (file_exists(Yii::app()->basePath . '/../repository/prdetail/' . $model->attachment)) {
                unlink(Yii::app()->basePath . '/../repository/prdetail/' . $model->attachment);
            }

            $models = CUploadedFile::getInstance($model, 'attachment');
            $extension = $models->extensionName;
            $model->attachment = md5($model->id_purchase_request) . $datetime_now . '.' . $extension;
            $filename = md5($model->id_purchase_request) . $datetime_now;
            $path = Yii::app()->basePath . '/../repository/prdetail/' . $filename . '.' . $extension;
            $models->saveAs($path);
        }




        if ($model->validate()) {
            if ($model->save()) {
                //echo "Save Success!"; exit();
                return $model;
            } else {
                //echo "Save Failed!";
                return false;
            }
        } else {
            //echo "validate fail";
            echo CHtml::errorSummary($model);
            exit();
            return false;
        }
    }

    public static function getDetailItem($data) {
        $RES = "-";
        $model = $data->purchase_item_table;

        if ($model == "ConsumableStockItem") {
            $item = $model::model()->findByPk($data->id_item);
            if ($item != null)
                $RES = $item->consumable_stock_item;
        }

        if ($model == "EhsItem") {
            $item = $model::model()->findByPk($data->id_item);
            if ($item != null)
                $RES = $item->ehs_item;
        }

        if ($model == "AgencyItem") {
            $item = $model::model()->findByPk($data->id_item);
            if ($item != null)
                $RES = $item->agency_item;
        }

        if ($model == "ServiceItem") {
            $item = $model::model()->findByPk($data->id_item);
            if ($item != null)
                $RES = $item->service_item;
        }


        return $RES;
    }

}

?>
