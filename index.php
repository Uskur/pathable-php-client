<ul>
	<h3>User</h3>
	
	<li><a href="?action=create">Create a User (Complete)</a></li>
	<li><a href="?action=get">Get a User(Complete)</a></li>
	<li><a href="?action=search">Search Users (Complete)</a></li>
	<li><a href="?action=updateaUser">Update a User (Complete)</a></li>
	<li><a href="?action=answerQuestion">Answer Question (Complete)</a></li>
	<li><a href="?action=updateQuestion">Update Answere(Complete)</a></li>
	<li><a href="?action=associateUserWithaRibbon">Associate Ribbon (Error)</a></li>
	<li><a href="?action=disassociateUserWithaRibbon">Disassociate Ribbon (Error)</a></li>
	
	<h3>Meetings</h3>
	
	<li><a href="?action=getMeeting">Get Meeting(Complete)</a></li>
	<li><a href="?action=removeaMeeting">Remove a Meeting(Works with error)</a></li>
	<li><a href="?action=createMeeting">Create Meeting(Complete)</a></li>
	<li><a href="?action=searchMeeting">Search Meeting(Complete)</a></li>
	<li><a href="?action=searchUserMeetings">Search User Meetings(Complete)</a></li>
	
	<h3>Memberships</h3>
	
	<li><a href="?action=addaUserToMeeting">Add a User to a Meeting (Complete (click options not added))</a></li>
	<li><a href="?action=removeaUserFromMeeting">Remove a User From a Meeting (Error)</a></li>
	
	<h3>Sessions</h3>
	
	<li><a href="?action=getSessionbyId">Get Session by User ID (Complete)</a></li>
	<li><a href="?action=getSessionbyEmailorExternalID">Get Session by Email or External ID(Complete)</a></li>
	<li><a href="?action=postSession">Post Session(?)</a></li>
	
</ul>
<pre>
<?php
use Uskur\PathableClient\PathableClient;

error_reporting(- 1);
ini_set('display_errors', 'On');
require_once 'vendor/autoload.php';

$pathable = PathableClient::create([
    'community_id' => '888528',
    'api_token' => '23593d6e-3520-42b4-bc53-8e43cb45264c',
    'auth_token' => 'vuapLuQisszdVgaeqbhy'
]);

$action = isset($_GET['action'])?$_GET['action']:null;

//*****USER*****

if($action == 'create') {
    $response = $pathable->CreateUser([
        'first_name' => 'Johny',
        'last_name' => 'Doe',
        'allowed_mails' => '',
        'allowed_sms' => '',
        'bio' => 'asd',
        'credentials' => 'asd',
        'enabled_for_email' => false,
        'enabled_for_sms' => false,
        'evaluator_id' => '111222',
        'event_external_id' => '131313', 
    ]);
}
elseif($action == 'get') {
    $response = $pathable->GetUser(['id'=>'1393452']);
}

elseif($action == 'search') {
    $response = $pathable->SearchUser(['query'=>'John']);
}

else if($action == 'updateaUser') {
    $response = $pathable->UpdateaUser([
        'user_id' => '1393452',
        'first_name' => 'Johny(update)',
        'last_name' => 'Doe(update2)',
        'allowed_mails' => '',
        'allowed_sms' => '',
        'bio' => 'asd',
        'credentials' => 'credentials',
        'enabled_for_email' => false,
        'enabled_for_sms' => false,
        'evaluator_id' => '111222',
        'event_external_id' => '131313'
    ]);
}

elseif($action == 'answerQuestion') {
    $response = $pathable->AnswerQuestion([
        'question_id' => '4937',
        'user_id' => '1393452',
        'answer' => 'Canada, United States'
    ]);
}

elseif($action == 'updateQuestion') {
    $response = $pathable->UpdateQuestion([
        'question_id' => '4938',
        'answer_id' => '1596727',
        'user_id' => '1393452',
        'answer' => 'Canada, United States, test'
    ]);
}

elseif($action == 'associateUserWithaRibbon') {
    $response = $pathable->AssociateUserWithaRibbon([
        'user_id' => 1393452,
        'ribbons' => '20594'
    ]);
}

elseif($action == 'disassociateUserWithaRibbon') {
    $response = $pathable->DisassociateUserWithaRibbon([
        'user_id' => 1426601,
        'ribbon_id' => 20004
    ]);
}


//*****MEETING*****

elseif($action == 'getMeeting') {
    $response = $pathable->GetMeeting([
        'name' => 'Test',
        'description' => 'Event Horizon'
    ]);
}
elseif($action == 'removeaMeeting') {
    $response = $pathable->removeaMeeting(['id' => '919301']);
}
elseif($action == 'searchMeeting') {
    $response = $pathable->SearchMeeting([
       'with'=>['external_id'=>'65b57c47-b7a6-4cbd-99bf-b9f951b6ebb8']
    ]);
}

elseif($action == 'createMeeting') {
    $response = $pathable->CreateMeeting([
        'name' => 'Sample meeting 2',
        'date' => '2019-04-08',
        'start_time' => '9:15 AM',
        'end_time' => '3:45 PM'
    ]);
}

elseif($action == 'addMeetingMembership') {
    $response = $pathable->AddMeetingMembership([
        'meeting_id' => '897181',
    ]);
}

elseif($action == 'searchUserMeetings') {
    $response = $pathable->SearchUserMeetings([
        'user_id' => 1371117
    ]);
}

//*****MEMBERSHIPS*****

elseif($action == 'addaUserToMeeting') {
    $response = $pathable->AddaUserToMeeting([
        'group_id' => 915909,
        'user_id' => 1393452
    ]);
}

elseif($action == 'removeaUserFromMeeting') {
    $response = $pathable->RemoveaUserFromMeeting([
        'group_id' => 915909,
        'user_id' => 1393452
    ]);
}

//*****SESSIONS*****

elseif($action == 'getSessionbyId') {
    $response = $pathable->GetSessionbyId([
        'user_id' => 1393452
    ]);
}

elseif($action == 'getSessionbyEmailorExternalID') {
    $response = $pathable->GetSessionbyEmailorExternalID([
        'primary_email' => 'johnybgoode@chukb.com'
    ]);
}

elseif($action == 'postSession') {
    $response = $pathable->PostSession([
        'primary_email' => 'johnybgoode@chukb.com',
        'password' => '654321'
    ]);
}

print_r($response);
?></pre>