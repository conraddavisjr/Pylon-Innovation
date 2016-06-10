<?php

/**
 * ProcessWire Configuration File
 *
 * Site-specific configuration for ProcessWire
 *
 * Please see the file /wire/config.php which contains all configuration options you may
 * specify here. Simply copy any of the configuration options from that file and paste
 * them into this file in order to modify them.
 * 
 * SECURITY NOTICE
 * In non-dedicated environments, you should lock down the permissions of this file so
 * that it cannot be seen by other users on the system. For more information, please
 * see the config.php section at: https://processwire.com/docs/security/file-permissions/
 *
 * ProcessWire 2.x
 * Copyright (C) 2015 by Ryan Cramer
 * This file licensed under Mozilla Public License v2.0 (http://mozilla.org/MPL/2.0/)
 *
 * https://processwire.com
 *
 */

if(!defined("PROCESSWIRE")) die();

/*** SITE CONFIG *************************************************************************/

/**
 * Enable debug mode?
 *
 * Debug mode causes additional info to appear for use during dev and debugging.
 * This is almost always recommended for sites in development. However, you should
 * always have this disabled for live/production sites.
 *
 * @var bool
 *
 */
$config->debug = false;


/*** INSTALLER CONFIG ********************************************************************/


/**
 * Installer: Database Configuration
 * 
 */
$config->dbHost = /*'localhost';*/ 'bpnOnline.db.7199052.hostedresource.com';
$config->dbName = /*'BPN';*/ 'bpnOnline';
$config->dbUser = /*'BPN';*/ 'bpnOnline';
$config->dbPass = /*'U7*#hPu@z!';*/ 'M!gYdtP@wz%97';
$config->dbPort = '3306';

/**
 * Installer: User Authentication Salt 
 * 
 * Must be retained if you migrate your site from one server to another
 * 
 */
$config->userAuthSalt = 'afb06a8babf01b2ab30b98853ba28d80'; 

/**
 * Installer: File Permission Configuration
 * 
 */
$config->chmodDir = '0755'; // permission for directories created by ProcessWire
$config->chmodFile = '0644'; // permission for files created by ProcessWire 

/**
 * Installer: Time zone setting
 * 
 */
$config->timezone = 'America/Los_Angeles';


/**
 * Installer: HTTP Hosts Whitelist
 * 
 */
$config->httpHosts = array('localhost:8888', 'localhost:8888/lab/Pylon-Innovation/sites/BPN/www/', 'bpn.conraddavisjr.com', 'http://bpn.conraddavisjr.com/', '/');

