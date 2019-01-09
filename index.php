<ul>
	<h3>User</h3>
	
	<li><a href="?action=create">Create a User (Complete)</a></li>
	<li><a href="?action=delete">Delete a User (Complete)</a></li>
	<li><a href="?action=get">Get a User(Complete)</a></li>
	<li><a href="?action=search">Search Users (Complete)</a></li>
	<li><a href="?action=updateaUser">Update a User (Complete)</a></li>
	<li><a href="?action=answerQuestion">Answer Question (Complete)</a></li>
	<li><a href="?action=updateQuestion">Update Answere(Complete)</a></li>
	<li><a href="?action=addRibbon">Add Ribbon (Complete)</a></li>
	<li><a href="?action=removeRibbon">Remove Ribbon (Complete)</a></li>
	
	<h3>Meetings</h3>
	
	<li><a href="?action=getMeeting">Get Meeting(Complete)</a></li>
	<li><a href="?action=deleteMeeting">Delete a Meeting(Works with error)</a></li>
	<li><a href="?action=createMeeting">Create Meeting(Complete)</a></li>
	<li><a href="?action=searchMeeting">Search Meeting(Complete)</a></li>
	<li><a href="?action=searchUserMeetings">Search User Meetings(Complete)</a></li>
	<li><a href="?action=editMeeting">Edit Meeting(Non existed in pathable???)</a></li>
	
	<h3>Memberships</h3>
	
	<li><a href="?action=getMembership">Get Membership (Complete)</a></li>
	<li><a href="?action=deleteMembership">Delete Membership (Complete)</a></li>
	<li><a href="?action=addaUserToMeeting">Add a User to a Meeting (Complete (click options not added))</a></li>
	<li><a href="?action=removeaUserFromMeeting">Remove a User From a Meeting (Error)</a></li>
	
	<h3>Sessions</h3>
	
	<li><a href="?action=getSessionbyId">Get Session by User ID (Complete)</a></li>
	<li><a href="?action=getSessionbyEmail">Get Session by Email or External ID(Complete)</a></li>
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
        'first_name' =>'first_name5',
        'last_name' => 'last_name5',
        'primary_email' => 'asd5@hotmail.com',
        'credentials' =>'title',
        'event_external_id' => 'id5',
        'master_external_id' => 'id5',
        'allowed_mails' => '',
        'allowed_sms' => '',
        'bio' => '',
        'enabled_for_email' => false,
        'enabled_for_sms' => false,
        'evaluator_id' => '',
        'photo_referred_url' => ''
    ]);
}

elseif($action == 'delete') {
    $response = $pathable->DeleteUser([
        'id'=>'1464029'
    ]);
}

elseif($action == 'get') {
    $response = $pathable->GetUser([
        'id'=>'1371117'
    ]);
}

elseif($action == 'search') {
    $response = $pathable->SearchUser([
        //'master_external_id' => '41b5f812-12b4-41ec-a8c8-0dbdf2469d01'
        //'query' => 'burak@uskur.com'
        'with' => ['kantarci.oguzhan@.com']
    ]);

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
        'event_external_id' => '131313',
        'photo_referred_url' => ''
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

elseif($action == 'addRibbon') {
    $response = $pathable->AddRibbon([
        'user_id' => 1463016,
        'ribbon_id' => 20593
    ]);
}

elseif($action == 'removeRibbon') {
    $response = $pathable->RemoveRibbon([
        'user_id' => 1463016,
        'ribbon_id' => 20593
    ]);
}


//*****MEETING*****

elseif($action == 'getMeeting') {
    $response = $pathable->GetMeeting([
        'id' => 924904
    ]);
}
elseif($action == 'deleteMeeting') {
    $response = $pathable->DeleteMeeting([
        'id' => '923468'
    ]);
}
elseif($action == 'searchMeeting') {
    $response = $pathable->SearchMeeting([
       'with'=>['external_id'=>'ef0b7047-f5b1-4e04-9f75-a27d2be71db8']
    ]);
}

elseif($action == 'createMeeting') {
    $response = $pathable->CreateMeeting([
        'external_id' => 'ogi',
        'name' => 'Sample meeting 2',
        'date' => '2019-04-08',
        'start_time' => '9:15 AM',
        'end_time' => '3:45 PM'
    ]);
}

elseif($action == 'addMeetingMembership') {
    $response = $pathable->AddMeetingMembership([
        'meeting_id' => '897181'
    ]);
}

elseif($action == 'searchUserMeetings') {
    $response = $pathable->SearchUserMeetings([
        'user_id' => 1371117
    ]);
}

elseif($action == 'editMeeting') {
    $response = $pathable->EditMeeting([
        'id' => '897181',
        'external_id' => 'ogi',
        'name' => 'Edit Meeting Test',
        'date' => '2019-04-08',
        'start_time' => '9:15 AM',
        'end_time' => '3:45 PM'
        
    ]);
}

//*****MEMBERSHIPS*****

elseif($action == 'getMembership') {
    $response = $pathable->GetMembership([
        'id' => 926451
    ]);
}

elseif($action == 'deleteMembership') {
    $response = $pathable->DeleteMembership([
        'group_id' => 926304,
        'id' => 19410310
    ]);
}

elseif($action == 'addaUserToMeeting') {
    $response = $pathable->AddaUserToMeeting([
        'group_id' => 926304,
        'user_id' => 1463016
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
        'user_id' => 1371117
    ]);
}

elseif($action == 'getSessionbyEmail') {
    $response = $pathable->GetSessionbyEmail([
        'primary_email' => 'burak@uskur.com.tr'
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