<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Calendar extends CI_Controller
{
    function __construct() {
    parent::__construct();
    $this->CI =& get_instance();
}

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
 public function getclient() {

  // Include the google api php libraries
    include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
    include_once APPPATH."libraries/google-api-php-client/contrib/Google_CalendarService.php";


  
  $gclient = new Google_Client();
  $gclient->setApplicationName($this->CI->config->item('Application_Name'));
  $gClient->setClientId($this->CI->config->item('Client_Id'));
  $gClient->setClientSecret($this->CI->config->item('Client_Secret'));
  $gclient->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {
    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    
    $authCode = trim(fgets(STDIN));

    // Exchange authorization code for an access token.
    $accessToken = $gclient->fetchAccessTokenWithAuthCode($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $gclient->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($gclient->isAccessTokenExpired()) {
    $gclient->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
  }
  return $gclient;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}

// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);

if (count($results->getItems()) == 0) {
  print "No upcoming events found.\n";
} else {
  print "Upcoming events:\n";
  foreach ($results->getItems() as $event) {
    $start = $event->start->dateTime;
    if (empty($start)) {
      $start = $event->start->date;
    }
    printf("%s (%s)\n", $event->getSummary(), $start);
  }
}
