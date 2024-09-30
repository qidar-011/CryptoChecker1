function updatePrices() {
    fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,solana&vs_currencies=usd')
        .then(response => response.json())
        .then(data => {
            document.getElementById('btc-price').textContent = `BTC: $${data.bitcoin.usd}`;
            document.getElementById('eth-price').textContent = `ETH: $${data.ethereum.usd}`;
            document.getElementById('sol-price').textContent = `SOL: $${data.solana.usd}`;
        })
        .catch(error => console.error('Error fetching prices:', error));
}
// تحديث الأسعار كل 5 دقائق
updatePrices();
setInterval(updatePrices, 300000);
