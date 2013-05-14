<?PHP

require('staff.inc.php');
require_once(INCLUDE_DIR.'class.ticket.php');
require_once(INCLUDE_DIR.'class.dept.php');
require_once(INCLUDE_DIR.'class.banlist.php');

$sql= "SELECT * FROM ras_ticket WHERE isanswered='0' "; 
//isanswered

$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)){
$a[] = $row;
}

$newfile="openfile.txt"; 
$file = fopen ($newfile, "w"); 
foreach ($a as $user) {
    $res ="Id: {$user[ticket_id]}\r\n"
       . "TicketID: {$user[ticketID]}\r\n"
       . "Email: {$user[email]}\r\n"
	   . "Name: {$user[name]}\r\n"
	   . "Subject: {$user[subject]}\r\n"
	   . "Help Topic: {$user[helptopic]}\r\n"
	   . "Phone: {$user[phone]}\r\n"
	   . "Post Date: {$user[created]}\r\n\n";


fwrite($file, $res); 

}

fclose ($file);


$sql= "SELECT * FROM ras_ticket WHERE isanswered='1' "; 
//isanswered

$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)){
$a[] = $row;
}

$newfile2="closedfile.txt"; 
$file2 = fopen ($newfile2, "w"); 
foreach ($a as $user) {
    $res ="Id: {$user[ticket_id]}\r\n"
       . "TicketID: {$user[ticketID]}\r\n"
       . "Email: {$user[email]}\r\n"
	   . "Name: {$user[name]}\r\n"
	   . "Subject: {$user[subject]}\r\n"
	   . "Help Topic: {$user[helptopic]}\r\n"
	   . "Phone: {$user[phone]}\r\n"
	   . "Post Date: {$user[created]}\r\n\n";
fwrite($file2, $res); 
}

fclose ($file2);
?>


