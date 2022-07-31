<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/asset';
    public $css = [
        'vendor/jqvmap/css/jqvmap.min.css',
        'vendor/chartist/css/chartist.min.css',
        'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
        'css/style.css',
        'css/custom.css',
        'https://cdn.lineicons.com/2.0/LineIcons.css',
    ];
    public $js = [
        'vendor/global/global.min.js',
        'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
        'vendor/chart.js/Chart.bundle.min.js',
        'js/custom.min.js',
        'js/deznav-init.js',
        'vendor/apexchart/apexchart.js',
        'js/dashboard/analytics.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
