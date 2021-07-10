<?php // automatically generated at 2021-07-10T21:05:51.044Z by: npm run dev 

class LaravelMixAssets {
    const version = '2021-07-10T21:05:51.044Z';
    const files = [
        "/js/app.js" => "/js/app.js?id=cd19770951a7a06b37cc",
        "/css/app.css" => "/css/app.css?id=c216e991b1b780eda9ac",
    ];
}

function mix($file) {
    return (isset(LaravelMixAssets::files[$file]) ? LaravelMixAssets::files[$file] : $file);
}

function mixVersion() {
    return LaravelMixAssets::version;
}
