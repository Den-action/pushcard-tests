<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Check request from site');
$I->haveHttpHeader('Content-Type', 'application/json');
#$I->am('user');
$data=['platform'=>'ios','udid'=>'550e8400-e29b-41d4-a716-446655440000'];
$I->sendPOST('v1/token','$data');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->canSeeResponseIsValidOnSchemaFile($test->getSchemaFileName('Error'));
$I->canSeeResponseContainsJson(['err' => ['TOKEN_REQUIRED']]);
?>
