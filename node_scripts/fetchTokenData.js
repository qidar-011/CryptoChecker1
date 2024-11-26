const { Connection, PublicKey } = require('@solana/web3.js');
const connection = new Connection('https://api.mainnet-beta.solana.com');
const args = process.argv.slice(2);
const tokenAddress = args[0];

async function fetchTokenDetails(tokenAddress) {
    try {
        const publicKey = new PublicKey(tokenAddress);
        const accountInfo = await connection.getParsedAccountInfo(publicKey);
        console.log(accountInfo.value.data.parsed.info);
        console.log(accountInfo.value.data.parsed.info);
        
        return accountInfo.value.data.parsed.info;
    } catch (error) {
        console.error("Error fetching token data:", error);
    }
}


module.exports = fetchTokenDetails(tokenAddress);