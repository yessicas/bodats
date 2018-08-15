<?php

class TimeSheetDB {

    public static function getsDurationByPreviousData($id_timesheet, $id_voyage_order, $StartDate) {

        $criteria = new CDbCriteria();
        $criteria->condition = '(id_voyage_order =:id_voyage_order AND StartDate <= :StartDate) AND StartDate < :StartDate';
        $criteria->params = array(':id_voyage_order' => $id_voyage_order, ':StartDate' => $StartDate, ':StartDate' => $StartDate);
        $criteria->order = "StartDate desc";
        $criteria->limit = 1;
        $prevData = Timesheet::model()->find($criteria);

//        echo Timesheet::model()->StartDate;
//        die();

        if ($prevData) {
            return TimeSheetDB::countDurationHours($prevData->StartDate, $StartDate);
        } else {
            return 0;
        }
    }

    public static function nextValue($currentId) {
        $records = Timesheet::find()->orderBy('id_timesheet DESC')->all();

        foreach ($records as $i => $record) {
            if ($record->id_timesheet == $currentId) {
                $next = isset($records[$i - 1]->id_timesheet) ? $records[$i - 1]->id_timesheet : null;
                $prev = isset($records[$i + 1]->id_timesheet) ? $records[$i + 1]->id_timesheet : null;
                break;
            }
        }
        //return['next' => $next, 'prev' => $prev];
		return array('next' => $next, 'prev' => $prev);
    }

    public static function actDuration($id_timesheet, $id_voyage_order) {

        $sql = "SELECT id_timesheet = $id_timesheet , previous, current, NEXT
                FROM
                  (
                    SELECT
                      @next AS NEXT,
                      @next := current AS current,
                      previous,
                      id_timesheet
                    FROM
                      (
                        SELECT @next := NULL
                      ) AS init,
                      (
                        SELECT
                          @prev AS previous,
                          @prev := e.Duration AS current,
                          e.id_timesheet
                        FROM
                          (
                            SELECT @prev := NULL
                          ) AS init,
                          timesheet AS e
                        ORDER BY e.id_timesheet
                      ) AS a
                    ORDER BY
                      a.id_timesheet DESC
                  ) AS b
                ORDER BY
                  id_timesheet";
    }

    public static function countDurationHours($startdate, $endate) {
        $date1 = $startdate;
        $date2 = $endate;
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $difference = $datetime1->diff($datetime2);
        //echo $difference->days.' days total<br>';
        //echo $difference->y.' years<br>';
        //echo $difference->m.' months<br>';
        //echo $difference->d.' days<br>';
        //echo $difference->h.' hours<br>';
        //echo $difference->i.' minutes<br>';
        //echo $difference->s.' seconds<br>';
        $minutes = $difference->days * 24 * 60;
        $minutes += $difference->h * 60;
        $minutes += $difference->i;
        //echo $minutes.' minutes';
        return round($minutes / 60, 2); // hour
    }

    public static function getTimesheetplan($id_voyage_order) {
        $criteria = new CDbCriteria();
        $criteria->order = "StartDate ASC";
        $datas = TimesheetPlan::model()->findAllByAttributes(array('id_voyage_order' => $id_voyage_order), $criteria);
        return $datas;
    }

    public static function getTotalSumaryTimesheet($id_voyage_order, $id_mst_timesheet_summary) {
        $id_voyage_order = intval($id_voyage_order * 1);
        $id_voyage_order = intval($id_mst_timesheet_summary * 1);

        $sql = "SELECT SUM( duration ) AS jumlah
		FROM  `timesheet` 
		WHERE 
		id_voyage_order = $id_voyage_order AND id_mst_timesheet_summary  = $id_mst_timesheet_summary ";
        $command = Yii::app()->db->createCommand($sql);
        $totaldata = $command->queryRow();
        return ($totaldata['jumlah'] != null) ? $totaldata['jumlah'] : 0;
    }

    public static function getActualTotalDurationPerVoyage($id_voyage_order) {
        //Anti SQL Injection - dipastikan variabel yang integer diubah ke integer.
        $id_voyage_order = intval($id_voyage_order * 1);

        $sql = "SELECT SUM(duration) as ACTUAL_DURATION FROM timesheet 
		WHERE id_voyage_order = '" . $id_voyage_order . "'
		GROUP BY id_voyage_order ";

        $command = Yii::app()->db->createCommand($sql);
        $totaldata = $command->queryRow();
        $total = 0;
        if ($totaldata['ACTUAL_DURATION'] != null)
            $total = $totaldata['ACTUAL_DURATION'];

        return $total / 24;
    }

    public static function updateActualVoyageDate($id_voyage_order) {
        //Get Start & end date
        $actualstart = TimeSheetDB::getTimeActualVoyage($id_voyage_order, "start");
        $actualend = TimeSheetDB::getTimeActualVoyage($id_voyage_order, "end");

        //Update Actual Start End Voyage
        VoyageOrderDB::updateActualDate($id_voyage_order, $actualstart, "start");
        VoyageOrderDB::updateActualDate($id_voyage_order, $actualend, "end");

        //Update Cost Control
        $TOTAL_DAYS = TimeSheetDB::getActualTotalDurationPerVoyage($id_voyage_order);
        VoyageOrderDB::updateActualDuration($id_voyage_order, $TOTAL_DAYS);
    }

    public static function getTimeActualVoyage($id_voyage_order, $mode = "end") {
        //Anti SQL Injection - dipastikan variabel yang integer diubah ke integer.
        $id_voyage_order = intval($id_voyage_order * 1);

        $func = "MAX";
        if ($mode == "end")
            $func = "MAX";

        if ($mode == "start")
            $func = "MIN";

        $sql = "SELECT " . $func . "(StartDate) as SELDATE FROM timesheet 
		WHERE id_voyage_order = '" . $id_voyage_order . "'
		GROUP BY id_voyage_order ";

        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryRow();
        $result = "";
        if ($data['SELDATE'] != null)
            $result = $data['SELDATE'];

        return $result;
    }

}

?>