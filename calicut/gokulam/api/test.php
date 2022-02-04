<?php

function computeAmount($entryTime, $exitTime, $minDuration, $minDurationRate, $rate) {
	//Calculating time spent in hour by vehicle.
	$durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
        $durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
	//Setting minimum rate as amount.
	$amount = $minDurationRate;
        // echo $durationInSec;
	//Calculating additional hour spent then allowed min duration for a fixed price.
	$addDuration = $durationInHr - $minDuration;
	
	//If additional hour spent is there, need to add fare for that.
	if($durationInSec < 900) {
               $amount = 0;
 }

else if ( $durationInSec >= 900  && $durationInSec <= 7200 ) 
	
	{
         $amount = 30;
	}



else if  ($durationInSec >= 7200) {

		$amount = 30 + ($addDuration * $rate) ;
	}
	
	return $amount;
}


$amt = computeAmount('2017-07-15 08:00:00', '2017-07-15 16:01:00', 2, 30, 10);
echo $amt;
  


?>