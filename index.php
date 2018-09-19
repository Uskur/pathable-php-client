<ul>
	<li><a href="?action=create">Create</a></li>
	<li><a href="?action=get">Get</a></li>
	<li><a href="?action=search">Search</a></li>
	<li><a href="?action=createMeeting">Create Meeting</a></li>
	<li><a href="?action=searchMeeting">Search Meeting</a></li>
	<li><a href="?action=addMeetingMembership">Add Meeting Membership</a></li>
	<li><a href="?action=answerQuestion">Answer Question</a></li>
	<li><a href="?action=updateQuestion">Update Question</a></li>
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

if($action == 'create') {
    $response = $pathable->CreateUser([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'allowed_mails' => '',
        'allowed_sms' => '',
        'bio' => '',
        'credentials' => '',
        'enabled_for_email' => false,
        'enabled_for_sms' => false,
        'evaluator_id' => '',
        'event_external_id' => '',    
    ]);
}
elseif($action == 'get') {
    $response = $pathable->GetUser(['id'=>'1393452']);
}elseif($action == 'search') {
    $response = $pathable->SearchUser(['query'=>'John']);
}
elseif($action == 'searchMeeting') {
    $response = $pathable->SearchMeeting([
        
    ]);
}
elseif($action == 'createMeeting') {
    $response = $pathable->CreateMeeting([
        'name' => 'Sample meeting',
        'starts_at' => '2019-04-08T12:00:00+00:00',
        'ends_at' => '2019-04-08T12:30:00+00:00',
    ]);
}
elseif($action == 'addMeetingMembership') {
    $response = $pathable->AddMeetingMembership([
        'meeting_id' => '897181',
        'user_id' => '1387235'
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
        'question_id' => '4937',
        'answer_id' => '1596727',
        'user_id' => '1393452',
        'answer' => 'Canada, United States'
    ]);
}
print_r($response);
?></pre>