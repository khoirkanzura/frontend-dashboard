const fs = require('fs');
const path = require('path');

const outDir = 'public/build';
// Find the manifest file (check both public/build/manifest.json and public/build/.vite/manifest.json)
let manifestPath = path.join(outDir, 'manifest.json');
if (!fs.existsSync(manifestPath)) {
    manifestPath = path.join(outDir, '.vite', 'manifest.json');
}

if (fs.existsSync(manifestPath)) {
    // Read the manifest
    const manifestContent = fs.readFileSync(manifestPath, 'utf8');
    const manifest = JSON.parse(manifestContent);

    // Make sure public/build/manifest.json exists
    const finalManifest = path.join(outDir, 'manifest.json');
    if (manifestPath !== finalManifest) {
        fs.mkdirSync(path.dirname(finalManifest), { recursive: true });
        fs.writeFileSync(finalManifest, manifestContent);
        console.log('Copied manifest to public/build/manifest.json');
    }

    // Copy to bootstrap/cache/manifest.json
    const cacheDir = 'bootstrap/cache';
    fs.mkdirSync(cacheDir, { recursive: true });
    fs.writeFileSync(path.join(cacheDir, 'manifest.json'), manifestContent);
    console.log('Copied manifest to bootstrap/cache/manifest.json');

    // Copy to storage/manifest.json
    const storageDir = 'storage';
    fs.mkdirSync(storageDir, { recursive: true });
    fs.writeFileSync(path.join(storageDir, 'manifest.json'), manifestContent);
    console.log('Copied manifest to storage/manifest.json');

    // Copy hashed assets to non-hashed versions if needed (matching original build script intent)
    const cssEntry = Object.entries(manifest).find(([key]) => key === 'resources/css/app.css')?.[1]?.file;
    const jsEntry = Object.entries(manifest).find(([key]) => key === 'resources/js/app.js')?.[1]?.file;
    
    if (cssEntry && fs.existsSync(path.join(outDir, 'assets', cssEntry))) {
        fs.copyFileSync(path.join(outDir, 'assets', cssEntry), path.join(outDir, 'assets', 'app.css'));
        console.log('Copied app.css to public/build/assets/app.css');
    }
    if (jsEntry && fs.existsSync(path.join(outDir, 'assets', jsEntry))) {
        fs.copyFileSync(path.join(outDir, 'assets', jsEntry), path.join(outDir, 'assets', 'app.js'));
        console.log('Copied app.js to public/build/assets/app.js');
    }
    
    console.log('Vite assets and manifests successfully prepared for deployment');
} else {
    console.error('Vite manifest not found after build!');
    process.exit(1);
}
