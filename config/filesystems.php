<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
            'throw' => false,
        ],

        'userImage' => [
            'driver' => 'local',
            'root' => storage_path('app/userImage'),
            'url' => env('APP_URL').'/userImage',
            'visibility' => 'userImage',
            'throw' => false,
        ],

        'property' => [
            'driver' => 'local',
            'root' => storage_path('app/property'),
            'url' => env('APP_URL').'/property',
            'visibility' => 'property',
            'throw' => false,
        ],

        'project' => [
            'driver' => 'local',
            'root' => storage_path('app/project'),
            'url' => env('APP_URL').'/project',
            'visibility' => 'project',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        //For Public Folder                             //For storage Folder
        public_path('public') => storage_path('app/public'),
        public_path('userImage') => storage_path('app/userImage'),
        public_path('property') => storage_path('app/property'),
        public_path('project') => storage_path('app/project'),
    ],

];
