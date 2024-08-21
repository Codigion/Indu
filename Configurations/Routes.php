<?php

/**
 * Weaver Framework - Project Routes Configuration
 *
 * This file defines all the project routes for the Weaver Framework.
 *
 */

// Define the project routes
$projectRoutes = array(

    /* Controller Routes */
    'IsApp' => 'AuthenticationController@isApp',
    'UpdatePassword' => 'AuthenticationController@updatePassword',
    'Authenticate' => 'AuthenticationController@signIn',
    'SignOut' => 'AuthenticationController@signOut',

    'TryNow' => 'UsersController@tryNow',
    'IdentifyCow' => 'UsersController@identifyCow',
   
   
    'UpdateSettings' => 'SettingsController@updateSettings',
    
    'AddModel' => 'ModelsController@addModel',
    'ChangeStatus' => 'ModelsController@changeStatus',
    'DeleteModel' => 'ModelsController@deleteModel',

    
    'GetAllDatabase' => 'DatabaseController@getAllDatabase',
    'GetAllDatabaseFailed' => 'DatabaseController@getAllDatabaseFailed',

    'GetAllUsers' => 'UsersController@getAllUsers',



    /* Portal Routes */
    '/' => 'Portal@Index',
    'activity' => 'Portal@activity',
    'contact-us' => 'Portal@contact',
    'about-us' => 'Portal@about',
    'privacy' => 'Portal@privacy',
    'terms-and-condition' => 'Portal@terms_condition',
    'faq' => 'Portal@faq',
    '404' => 'Portal@notFound',


    /* Admin Routes */
    'dashboard' => 'Admin@dashboard',
    'admin' => 'Admin@admin_login',
    'users' => 'Admin@users',
    'activities' => 'Admin@activities',
    'ai-models' => 'Admin@models',
    'account-settings' => 'Admin@accountSettings',
    'database' => 'Admin@database',
    'failed-database' => 'Admin@databaseFailed',
    'sign-out' => 'Admin@signOut',
    'model-setting' => 'Admin@modelSettings',
    'contacted' => 'Admin@contacted',


    /* Controller Routes */


    /* Lab Routes */
    '_' => 'Lab@Index',


    /* System Routes */
    /**
     * Sending Pending Emails from the Mail Broker
     * 
     * To ensure that emails are promptly sent, you can configure a Cron Job to trigger the following route.
     * We recommend scheduling this job to run every 10 seconds.
     * 
     * To set up the CronJob, add the following entries to your crontab file:
     * 
     * ```shell
     *  * * * * * curl [<PROJECT_URL>]/mx
     *  * * * * * sleep 10 ; curl [<PROJECT_URL>]/mx
     *  * * * * * sleep 20 ; curl [<PROJECT_URL>]/mx
     *  * * * * * sleep 30 ; curl [<PROJECT_URL>]/mx
     *  * * * * * sleep 40 ; curl [<PROJECT_URL>]/mx
     *  * * * * * sleep 50 ; curl [<PROJECT_URL>]/mx
     * ```
     * 
     * This CronJob will automatically process and send any pending emails from the Mail Broker,
     * ensuring timely delivery to recipients.
     * 
     */
    'mx' => 'Mailer@send'
);
