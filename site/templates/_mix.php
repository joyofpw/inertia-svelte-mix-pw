<?php // automatically generated at 2021-07-14T17:15:04.219Z by: npm run dev

class LaravelMixAssets {
    const version = '2021-07-14T17:15:04.219Z';
    const files = [
        "/js/app.js" => "/js/app.js?id=cf61765885679ef97abd",
        "/css/app.css" => "/css/app.css?id=c216e991b1b780eda9ac",
    ];
}

function mix($file) {
    return (isset(LaravelMixAssets::files[$file]) ? LaravelMixAssets::files[$file] : $file);
}

function mixVersion() {
    return LaravelMixAssets::version;
}
