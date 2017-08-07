 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Define Css and Js Url
     if ( ! function_exists('design_url()'))
     {
       function design_url()
       {
          return base_url().'design/';
       }
     }
//====================

//Print Week Number
//This is Useful to set kind of categories
function getIsoWeeksInYear($year) {
    $date = new DateTime;
    $date->setISODate($year, 53);
    return ($date->format("W") === "53" ? 53 : 52);
}
//========================
function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $ret['week_start'] = $dto->setISODate($year, $week)->format('D d M');
  $ret['week_end'] = $dto->modify('+6 days')->format('D d m Y');
  return $ret;
}
//========================
function PrintWeekNumber(){
$date = new DateTime();
$year = $date->format("Y");	

$weeks = getIsoWeeksInYear($year);

for($x=1; $x<=$weeks; $x++){
    $dates = getStartAndEndDate($x, $year);
    echo "<option value='Week-" .$x . "'>Week " .$x ." Start-" . $dates['week_start'] . "<option>";
}	
}