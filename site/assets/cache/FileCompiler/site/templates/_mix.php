<?php // automatically generated at 2021-07-09T02:08:29.895Z by: npm run dev 
namespace ProcessWire;

class LaravelMixAssets {
    const version = '2021-07-09T02:08:29.895Z';
    const files = [
        "/js/app.js" => "/js/app.js?id=ac73151db2fa5767fa56",
        "/css/app.css" => "/css/app.css?id=c216e991b1b780eda9ac",
    ];
}

function mix($file) {
    return (isset(LaravelMixAssets::files[$file]) ? LaravelMixAssets::files[$file] : $file);
}

function mixVersion() {
    return LaravelMixAssets::version;
}