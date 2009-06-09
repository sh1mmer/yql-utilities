<?php
/*************************************************************************************************************
* private_data_fetch.php
* YQL PHP OAuth Widget
*
* Created by Jonathan LeBlanc on 06/09/09.
* Copyright (c) 2009 Yahoo! Inc. All rights reserved.
* 
* The copyrights embodied in the content of this file are licensed under the BSD (revised) open source license.
*************************************************************************************************************/

require_once('config.php');
require_once('php_sdk/Yahoo.inc');
require_once('CustomSessionStore.inc');

$sessionStore = new CustomSessionStore();
$session = YahooSession::initSession(KEY, SECRET, APPID, TRUE, CALLBACK, $sessionStore);
$updates = $session->query(stripslashes($_POST['q']));
$badge = $session->query('select guid, familyName, givenName, image, location, nickname, profileUrl, status from social.profile where guid=me');

echo json_encode(array('badge' => $badge, 'results' => $updates));
?>
