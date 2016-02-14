<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'sanis_whoops',
    'title'       => 'Whoops Exception Handling',
    'description' => [
        'de' => 'Whoops für OXID.',
        'en' => 'Whoops for OXID. Make your exceptions look nice and easy to understand.',
    ],
    'thumbnail'   => 'logo.png',
    'version'     => '1.0',
    'email'       => 'justinas.bolys@gmail.com',
    'author'      => 'Justinas Bolys',
    'url'         => 'https://github.com/sanis/oxid-whoops/',
    'files'       => [],
    'extend'      => [
        'oxshopcontrol'      => 'sanis/whoops/extends/whoops_oxshopcontrol',
        'oxexceptionhandler' => 'sanis/whoops/extends/whoops_oxexceptionhandler',
    ],
    'templates'   => [],
    'blocks'      => [],
    'settings'    => [],
    'events'      => [],
];
