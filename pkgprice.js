// Fetch package prices from login.html and make available for buy.html
function fetchPackagePrices(callback) {
    fetch('login.html')
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const packages = doc.querySelectorAll('#packages .package');
            const priceMap = {};
            packages.forEach(pkg => {
                const name = pkg.querySelector('h2')?.textContent?.trim();
                const priceText = pkg.querySelector('p[style*="font-weight: bold"]')?.textContent;
                let price = null;
                if (priceText) {
                    const match = priceText.match(/(\d+)/);
                    if (match) price = match[1];
                }
                if (name && price) priceMap[name] = price;
            });
            callback(priceMap);
        });
}
window.fetchPackagePrices = fetchPackagePrices;
