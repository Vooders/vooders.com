<?php
// Forked from https://gist.github.com/1809044
// Available from https://gist.github.com/nichtich/5290675#file-deploy-php
// curl -X POST -d 'token=xoxb-184717169201-pqbrIEhySnzdzGmc4MKGGswo&channel=kevs-test&text=Text here.&username=deploy-bot' https://slack.com/api/chat.postMessage
$TITLE   = 'Git Deployment Hamster';
$VERSION = '0.11';
echo <<<EOT
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>$TITLE</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
  o-o    $TITLE
 /\\"/\   v$VERSION
(`=*=') 
 ^---^`-.
EOT;
// Check whether client is allowed to trigger an update
$allowed_ips = array(
	'207.97.227.', '50.57.128.', '108.171.174.', '50.57.231.', '204.232.175.', '192.30.252.',  // GitHub
   '95.85.55.96'
);
$allowed = false;
$headers = apache_request_headers();
if (@$headers["X-Forwarded-For"]) {
    $ips = explode(",",$headers["X-Forwarded-For"]);
    $ip  = $ips[0];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
foreach ($allowed_ips as $allow) {
    if (stripos($ip, $allow) !== false) {
        $allowed = true;
        break;
    }
}
if (!$allowed) {
	header('HTTP/1.1 403 Forbidden');
 	echo "<span style=\"color: #ff0000\">Sorry, no hamster - better convince your parents!</span>\n";
    echo "</pre>\n</body>\n</html>";
    exit;
}
flush();

$entityBody = file_get_contents('php://input');
$entityBody = json_decode($entityBody);

$text = $entityBody->commits->committer->name . " has triggered a deployment";
$string = 'token=xoxb-184717169201-pqbrIEhySnzdzGmc4MKGGswo&channel=kevs-test&text=".$text."&username=deploy-bot';
// cURL the stuff
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://slack.com/api/chat.postMessage',
    CURLOPT_POSTFIELDS => $string
]);
$results = curl_exec($ch);
curl_close($ch);


$output = "\n";
$log = "####### ".date('Y-m-d H:i:s'). " #######\n";

// Run it
$tmp = shell_exec("git pull 2>&1");
// Output
$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
$output .= htmlentities(trim($tmp)) . "\n";
$log  .= "\$ git pull\n".trim($tmp)."\n";



// Run it
$tmp = shell_exec("git status 2>&1");
// Output
$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
$output .= htmlentities(trim($tmp)) . "\n";
$log  .= "\$ git status\n".trim($tmp)."\n";

$log .= "\n";
file_put_contents ('deploy-log.txt',$log,FILE_APPEND);
echo $output; 
?>
</pre>
</body>
</html>