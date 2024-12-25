<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Organizational Chart Library
    |--------------------------------------------------------------------------
    |
    | This setting allows you to choose which charting library to use to render
    | the organizational chart. Currently, you can choose between 'chart.js'
    | or other libraries that you may want to integrate in the future.
    |
    */

    'chart_library' => 'chart.js', // Default is 'chart.js', you can change it if you use another library

    /*
    |--------------------------------------------------------------------------
    | Default Organizational Chart Options
    |--------------------------------------------------------------------------
    |
    | Here you can define options related to the appearance and behavior of
    | your organizational chart. This may include settings for colors,
    | sizes, and other preferences that should be applied by default.
    |
    */

    'default_options' => [
        'background_color' => '#f0f0f0', // Background color for the chart area
        'node_color' => '#3498db', // Color of nodes (employees)
        'line_color' => '#2ecc71', // Color of lines connecting nodes
        'font_color' => '#333', // Font color for employee names
        'font_size' => 12, // Font size for employee names
    ],

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable Chart Tooltips
    |--------------------------------------------------------------------------
    |
    | You can enable or disable tooltips that appear when hovering over nodes.
    | This is useful if you want to provide additional information about
    | employees, such as their positions or other data.
    |
    */

    'tooltips_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable Employee Deletion
    |--------------------------------------------------------------------------
    |
    | This setting controls whether users can delete employees from the
    | organizational chart. You can set this to 'true' or 'false' based on
    | your requirements.
    |
    */

    'deletion_enabled' => true,  // Set to false if you want to disable employee deletion
];
