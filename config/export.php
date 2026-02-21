<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Export Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify which filesystem disk the exporter should use
    | when writing the generated files. For a simple local setup, use the
    | "local" disk, which targets the storage/app directory by default.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Destination Path
    |--------------------------------------------------------------------------
    | This is where the static HTML files will be saved.
    | Set this to your web root for sarab.tech.
    */
    'disk' => env('EXPORT_DISK', 'static_output'),
];
