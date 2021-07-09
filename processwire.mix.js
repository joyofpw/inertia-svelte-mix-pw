const path = require('path');
const fs = require('fs');

// use
// <link href='<?php echo mix("/css/app.css") ?>' rel='stylesheet'>
// <script src='<?php echo mix("/js/app.js") ?>' defer></script>
// in your templates

const template = `<?php // automatically generated at {{timestamp}} by: npm run dev 

class LaravelMixAssets {
    const version = '{{timestamp}}';
    const files = [{{mix}}
    ];
}

function mix($file) {
    return (isset(LaravelMixAssets::files[$file]) ? LaravelMixAssets::files[$file] : $file);
}

function mixVersion() {
    return LaravelMixAssets::version;
}
`;

module.exports = async (filename = null) => {

    if (!filename) {
        filename = "site/templates/_mix.php";
    }

    filename = path.resolve(__dirname, filename)

    const manifest = require(
        path.resolve(
            __dirname,
            "public/mix-manifest.json"
        )
    );
  
    let items = ''
    const keys = Object.keys(manifest);
    keys.forEach(key => {
        items += `
        "${key}" => "${manifest[key]}",`
    });

    const now = (new Date()).toISOString()
    const out = template.replace(
        /{{mix}}/g,
        items)
        .replace(
        /{{timestamp}}/g,
        now
    )

    fs.writeFileSync(filename, out)
};