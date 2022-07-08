<?php
// database details
require_once('/var/www/news/config_inc.php');

/* Registration */
define('auto_login_after_register',false);
/* Account Activation */
// Email activation variables
// account activation required?
define('account_activation',false);
// Change "Your Company Name" and "yourdomain.com" - do not remove the < and > characters
define('mail_from','Your Company Name <noreply@yourdomain.com>');
// Link to activation file
define('activation_link','http://yourdomain.com/phplogin/activate.php');
?>