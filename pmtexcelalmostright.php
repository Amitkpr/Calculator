<?php
/* $$Loan = '102400';
$interest = '4.5';
$months = '360';

   function pmt($interest, $months, $$Loan) {
       $months = $months;
       $interest = $interest / 1200;
       $amount = $interest * -$$Loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       return number_format($amount, 2);
    }

    $amount = pmt($interest, $months, $$Loan);
    echo "Your payment will be &pound;" . round($amount,2) . " a month, for " . $months . " months";
 */	 

	function interest($investment,$year,$rate=15,$n=1){
	    $accumulated=0;
	    if ($year > 1){
	            $accumulated=interest($investment,$year-1,$rate,$n);
	            }
	    $accumulated += $investment;
	    $accumulated = $accumulated * pow(1 + $rate/(100 * $n),$n);
	    return $accumulated;
    }
	echo interest(1200,2,$rate=2,$n=1);
	
/* $$Loan = '111000';
$interest = '6';
$months = '24';

   function pmt($interest, $months, $$Loan) {
       $months = $months;
       $interest = $interest / 1200;
       $amount = $interest * -$$Loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       return number_format($amount, 2);
    }

    $amount = pmt($interest, $months, $$Loan);
    echo "Your payment will be &pound;" . round($amount,2) . " a month, for " . $months . " months";
 */
 


/* require_once 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Calculation/Financial.php';

$rate = 4.5;
$nper = 360;
$pv = 102400;
$start = 1;
$end = 12;

echo CUMPRINC($rate, $nper, $pv, $start, $end, $type = 0); */

//echo $hello = 102400 * 0.00375 * pow (1 + 0.00375,360) / (1 -pow(1 + 0.00375,360));

//echo $amount = $interest * -$Loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));

/* $EMI = 102400 * 0.00375 * pow((1+0.00375),360) / (1-pow((1+0.00375),360));

echo  $EMI /(0.00375 * pow((1+0.00375),12) / (1-pow((1+0.00375),12))); */

/* function calcPmt( $amt , $i, $term ) {

$int = $i/1200;
$int1 = 1+$int;
$r1 = pow($int1, $term);

$pmt = $amt*($int*$r1)/($r1-1);

    return $pmt;

}

echo calcPmt( 102400, 4.5, 360 ); */

/* include "class.amort.php";

if (!$amount=$_GET['amount']){        //first time set all to zero
 $amount=0;
}
if (!$rate=$_GET['rate']){
 $rate=0;
}
if (!$years=$_GET['years']){
 $years=0;
}
$am=new amort($amount,$rate,$years);   //make an instance of amort and set the numbers
$am->showForm();                       //show the form to get the numbers
if($amount*$rate*$years <>0){          //if any one is zero, don't show the table
$am->showTable(true);                  //if true, show table, else don't
} */

$lamount = 100000; // Loan Amount
$mi = 10; // Monthly interest %ge
$n = 1; // No of Years

$ny = $n * 12; // No of months
$mic = $mi /1200; // Monthly interest

$top = pow((1+$mic),$ny);
$bottom = $top - 1;
$sp = $top / $bottom;


$emi = (($lamount * $mic) * $sp);
/* echo $emi; */

  print "<table border='1' width='100%'><tr>";
  print "<td width='14%' align='center'>Payment Number</td>";
  print "<td width='14%' align='center'>Loan Amount</td>";
  print "<td width='14%' align='center'>Interest Paid</td>";
  print "<td width='14%' align='center'>Added Loan</td>";
  print "<td width='14%' align='center'>EMI</td>";
  print "<td width='14%' align='center'>Principal Amount</td>";
  print "<td width='14%' align='center'>YearlyInterestPaid</td>";
  print "<td width='14%' align='center'>YearlyAcruedPrincipal</td>";
  print "</tr>";
  $k=1;
  $calArray = array();
for($i=1;$i<=360;$i++){
	
	if($i==1){
	print "<tr>";
	print "<td width='14%' align='center'>$i</td>";
	$interestPaymentMonth = $lamount*$mic;
	if(empty($CaluclatePreviousInterestPaymentMonth)){
		$CaluclatePreviousInterestPaymentMonth ='';
	}
	$CaluclatePreviousInterestPaymentMonth = $interestPaymentMonth+$CaluclatePreviousInterestPaymentMonth;
	$calculateTotalLoanAndInterest = $lamount+$interestPaymentMonth;
	$calculateTotalPrincipalAmount = $emi-$interestPaymentMonth;
	if(empty($calculatePreviousPayment)){
		$calculatePreviousPayment ='';
	}
	$calculatePreviousPayment = $calculateTotalPrincipalAmount+$calculatePreviousPayment;
	print "<td width='14%' align='right'>$". $lamount . "</td>";
	print "<td width='14%' align='right'>$". $interestPaymentMonth . "</td>";
	print "<td width='14%' align='right'>$". $calculateTotalLoanAndInterest . "</td>";
	print "<td width='14%' align='right'>$". $emi . "</td>";
	print "<td width='14%' align='right'>$". $calculatePreviousPayment . "</td>";
	print "</tr>";
	} else {
		
		print "<tr>";
		print "<td width='14%' align='center'>$i</td>";
		$lamount = $calculateTotalLoanAndInterest-$emi;
		$interestPaymentMonth = $lamount*$mic;
		if(empty($CaluclatePreviousInterestPaymentMonth)){
		$CaluclatePreviousInterestPaymentMonth ='';
		}
		$CaluclatePreviousInterestPaymentMonth = $interestPaymentMonth+$CaluclatePreviousInterestPaymentMonth;
		$calculateTotalLoanAndInterest = $lamount+$interestPaymentMonth;
		$calculateTotalPrincipalAmount = $emi-$interestPaymentMonth;
		$calculatePreviousPayment = $calculateTotalPrincipalAmount+$calculatePreviousPayment;
		$calArray[] = $calculateTotalPrincipalAmount;
		print "<td width='14%' align='right'>$". number_format(round($lamount,2)) . "</td>";
		print "<td width='14%' align='right'>$". number_format(round($interestPaymentMonth,2)) . "</td>";
		print "<td width='14%' align='right'>$". number_format(round($calculateTotalLoanAndInterest,2)) . "</td>";
		print "<td width='14%' align='right'>$". number_format(round($emi,2)) . "</td>";
		print "<td width='14%' align='right'>$". number_format(round($calculatePreviousPayment,2)) . "</td>";
		$k++;
		if($k==12){
		$k=0;
		//$calculatePreviousPayment ='';
		print "<td width='14%' align='right' style='font-weight:bold'>$". number_format(round($calculatePreviousPayment,2))  . "</td>";
		print "<td width='14%' align='right' style='font-weight:bold'>$". number_format(round($CaluclatePreviousInterestPaymentMonth,2))  . "</td>";
		$calculatePreviousPayment ='';
		$CaluclatePreviousInterestPaymentMonth = '';
		}
		print "</tr>";
		
	}
}
 print "</table>";
?>