<?php
ob_start();
include 'config.php';
$curdate=  date('Y-m-d');
$SQL = "SELECT transaction_id,redemption_id,vehicle_type,vehicle_number,entry_time, exit_time,amount, (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) AS duration, (CASE WHEN status = '1' THEN 'Completed' ELSE 'Running' END ) as status 
               FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'";
$header = '';
$result ='';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );

$fields = mysql_num_fields ( $exportData );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Todays_transaction.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
 
?>