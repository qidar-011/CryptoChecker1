const { Connection, PublicKey } = require('@solana/web3.js');
const rugcheck = require('solana-rugcheck');

const args = process.argv.slice(2);
const tokenAddress = args[0];

async function checkToken(address) {
    try {
        const connection = new Connection('https://api.mainnet-beta.solana.com');
        const publicKey = new PublicKey(address);

        // استخدام rugcheck لفحص العملة
        const result = await rugcheck.analyzeToken(connection, publicKey);

        console.log(JSON.stringify(result));
    } catch (error) {
        console.error(JSON.stringify({ error: error.message }));
    }
}

checkToken(tokenAddress);
