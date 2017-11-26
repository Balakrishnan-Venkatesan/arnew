<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

accounts::create();
$records = accounts::findAll();
$record = accounts::findOne(8);
$acc= new account();
$head= $acc->header();
echo '<h1>accounts table find all </h1>';
echo htmlTable::tableNew($head,$records);
echo '<hr>';

echo '<h1>accounts table find one </h1>';
echo htmlTable::tableNew($head,$record);
echo '<hr>';

$acc->delete(33);
$a= accounts::findAll();
echo '<h1>accounts table delete </h1>';
echo htmlTable::tableNew($head,$a);
echo '<hr>';

$acc->fname='tony';
$acc->lname='martial';
$acc->gender='male';
$acc->insert();
$a= accounts::findOne(33);
echo '<h1>accounts table insert </h1>';
echo htmlTable::tableNew($head,$a);
echo '<hr>';

$acc->phone= '848';
$acc->id=33;
$acc->fname='harry';
$acc->lname='winks';
$acc->email='winks@fmail.com';
$acc->birthday='1111-11-11';
$acc->gender='male';
$acc->password='winks';
$acc->update(33);
$a= accounts::findOne(33);
echo '<h1>accounts table update </h1>';
echo htmlTable::tableNew($head,$a);
echo '<hr>';

todos::create();
$records = todos::findAll();
$td= new todo();
$head= $td->header();
echo '<h1>todos table find all </h1>';
echo htmlTable::tableNew($head,$records);
echo '<hr>';

$record = todos::findOne(4);
echo '<h1>todos table find one </h1>';
echo htmlTable::tableNew($head,$record);
echo '<hr>';

$td->delete(33);
$a= todos::findAll();
echo '<h1>todos table delete </h1>';
echo htmlTable::tableNew($head,$a);
echo '<hr>';

$td->owneremail='marcusford@njit.com';
$td->message='new todo';
$td->save();
$a1= todos::findAll();
echo '<h1>todos table insert </h1>';
echo htmlTable::tableNew($head,$a1);
echo '<hr>';

$td->owneremail='marcusford@njit.com';
$td->message='update todo';
$td->save();
$a1= todos::findAll();
echo '<h1>todos table update </h1>';
echo htmlTable::tableNew($head,$a1);
echo '<hr>';

?>