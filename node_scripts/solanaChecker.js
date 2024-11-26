// node_scripts/solanaChecker.js

require('dotenv').config();
const { Connection, PublicKey } = require('@solana/web3.js');
const fetch = require('node-fetch');

const args = process.argv.slice(2);
const tokenAddress = args[0];

// احصل على مفتاح API من متغيرات البيئة
const apiKey = process.env.SOLSCAN_API_KEY;

async function checkToken(address) {
    try {
        const connection = new Connection('https://api.mainnet-beta.solana.com', 'confirmed');
        const publicKey = new PublicKey(address);

        // التحقق من وجود الحساب
        const accountInfo = await connection.getParsedAccountInfo(publicKey);
        if (!accountInfo.value) {
            throw new Error('Token account not found.');
        }

        const accountData = accountInfo.value.data;
        if (accountData === null) {
            throw new Error('Invalid account data.');
        }

        // التحقق مما إذا كان الحساب هو Token Mint
        const isMint = accountData['parsed']['type'] === 'mint';
        if (!isMint) {
            throw new Error('Invalid param: not a Token mint');
        }

        // الحصول على معروض التوكن
        const tokenSupply = await connection.getTokenSupply(publicKey);
        const totalSupply = tokenSupply.value.uiAmount;

        // جلب أكبر الحسابات (أعلى حاملي التوكن)
        const tokenAccounts = await connection.getTokenLargestAccounts(publicKey);
        const topHolders = tokenAccounts.value.map(account => account.address);

        // إعداد الرؤوس (Headers) لطلبات Solscan API
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'token': apiKey,
        };

        // جلب بيانات Solscan API
        const solscanApiUrl = `https://api.solscan.io/token/meta?tokenAddress=${address}`;
        const response = await fetch(solscanApiUrl, { headers });

        if (!response.ok) {
            throw new Error(`Solscan API responded with status ${response.status}`);
        }

        const tokenInfo = await response.json();

        if (!tokenInfo || tokenInfo.error) {
            throw new Error('Token not found on Solscan.');
        }

        // جلب حقل "jito" من Solscan API إذا كان متاحًا
        const jito = tokenInfo.data.jito || 'N/A';

        // استخراج المعلومات المطلوبة
        const result = {
            name: tokenInfo.data.name || 'N/A',
            symbol: tokenInfo.data.symbol || 'N/A',
            network: 'Solana',
            total_supply: totalSupply,
            decimals: tokenSupply.value.decimals,
            circulating_supply: tokenInfo.data.circulatingSupply || 'N/A',
            market_cap: tokenInfo.data.marketCap || 'N/A',
            price_usd: tokenInfo.data.priceUsdt || 'N/A',
            trading_volume: tokenInfo.data.volumeUsdt || 'N/A',
            freeze: tokenInfo.data.freezeAuthority ? true : false,
            mint: tokenInfo.data.mintAuthority ? true : false,
            logo_url: tokenInfo.data.icon || null,
            top_holders: topHolders.slice(0,5),
            audit_results: {
                security_audit: tokenInfo.data.securityReport || 'N/A',
                contract_verified: tokenInfo.data.verified || false,
                developer_team: tokenInfo.data.team || 'N/A',
            },
            token_rating: {
                community: tokenInfo.data.communityScore || 'N/A',
                liquidity: tokenInfo.data.liquidityScore || 'N/A',
                project_quality: tokenInfo.data.projectScore || 'N/A',
            },
            jito: jito,
        };

        console.log(JSON.stringify(result));
    } catch (error) {
        console.error(JSON.stringify({ error: error.message }));
        process.exit(1);
    }
}

checkToken(tokenAddress);


/* const { Connection, PublicKey } = require('@solana/web3.js');
const fetch = require('node-fetch');

const args = process.argv.slice(2);
const tokenAddress = args[0];

async function checkToken(address) {
    try {
        const connection = new Connection('https://api.mainnet-beta.solana.com');
        const publicKey = new PublicKey(address);

        // جلب معلومات التوكن الأساسية
        const tokenSupply = await connection.getTokenSupply(publicKey);
        const tokenAccounts = await connection.getTokenLargestAccounts(publicKey);

        // استخدام Solscan API لجلب المزيد من المعلومات
        const solscanApiUrl = `https://public-api.solscan.io/token/meta?tokenAddress=${address}`;
        const response = await fetch(solscanApiUrl);
        
        if (!response.ok) {
            throw new Error(`Solscan API responded with status ${response.status}`);
        }

        const tokenInfo = await response.json();

        if (!tokenInfo || tokenInfo.error) {
            throw new Error('Token not found or invalid response from Solscan.');
        }

        // جلب حقل "jito" من مصدر آخر إذا كان متاحًا
        const jito = tokenInfo.data.jito || 'N/A'; // تعديل حسب مصدر "jito"

        // استخراج المعلومات المطلوبة
        const result = {
            name: tokenInfo.data.name || 'N/A',
            symbol: tokenInfo.data.symbol || 'N/A',
            network: 'Solana',
            total_supply: tokenSupply.value.amount / Math.pow(10, tokenSupply.value.decimals),
            decimals: tokenSupply.value.decimals,
            circulating_supply: tokenInfo.data.circulatingSupply || 'N/A',
            market_cap: tokenInfo.data.marketCap || 'N/A',
            price_usd: tokenInfo.data.priceUsdt || 'N/A',
            trading_volume: tokenInfo.data.volumeUsdt || 'N/A',
            freeze: tokenInfo.data.freezeAuthority ? true : false,
            mint: tokenInfo.data.mintAuthority ? true : false,
            top_holders: [], // سنقوم بجلبها لاحقًا
            audit_results: {
                security_audit: tokenInfo.data.securityAudit || 'N/A', // إذا كانت متاحة
                contract_verified: tokenInfo.data.verified || false,
                developer_team: tokenInfo.data.developerTeam || 'N/A', // إذا كانت متاحة
            },
            token_rating: {
                community: tokenInfo.data.communityRating || 'N/A', // إذا كانت متاحة
                liquidity: tokenInfo.data.liquidityRating || 'N/A', // إذا كانت متاحة
                project_quality: tokenInfo.data.projectQualityRating || 'N/A', // إذا كانت متاحة
            },
            jito: jito, // إضافة حقل "jito"
        };

        // جلب أعلى 5 حاملين للتوكن
        const holdersResponse = await fetch(`https://public-api.solscan.io/token/holders?tokenAddress=${address}&limit=5`);
        if (holdersResponse.ok) {
            const holdersData = await holdersResponse.json();
            if (holdersData.success !== false && holdersData.data) {
                result.top_holders = holdersData.data.map(holder => holder.owner);
            }
        }

        console.log(JSON.stringify(result));
    } catch (error) {
        console.error(JSON.stringify({ error: error.message }));
        process.exit(1);
    }
}

checkToken(tokenAddress); */


/* const { Connection, PublicKey } = require('@solana/web3.js');
const fetch = require('node-fetch');

const args = process.argv.slice(2);
const tokenAddress = args[0];

async function checkToken(address) {
    try {
        const connection = new Connection('https://api.mainnet-beta.solana.com');
        const publicKey = new PublicKey(address);

        // جلب معلومات التوكن الأساسية
        const tokenSupply = await connection.getTokenSupply(publicKey);
        const tokenAccounts = await connection.getTokenLargestAccounts(publicKey);

        // استخدام Solscan API لجلب المزيد من المعلومات
        const solscanApiUrl = `https://public-api.solscan.io/token/meta?tokenAddress=${address}`;
        const response = await fetch(solscanApiUrl);
        const tokenInfo = await response.json();

        if (!tokenInfo || tokenInfo.error) {
            console.error(JSON.stringify({ error: 'Token not found on Solscan.' }));
            process.exit(1);
        }

        // جلب حقل "jito" من مصدر آخر إذا كان متاحًا
        // على سبيل المثال، يمكن أن يكون جزءًا من معلومات إضافية أو من API مختلف
        // هنا سنفترض أنه جزء من بيانات Solscan API
        const jito = tokenInfo.data.jito || 'N/A'; // تعديل حسب مصدر "jito"

        // استخراج المعلومات المطلوبة
        const result = {
            name: tokenInfo.data.name,
            symbol: tokenInfo.data.symbol,
            network: 'Solana',
            total_supply: tokenSupply.value.amount / Math.pow(10, tokenSupply.value.decimals),
            decimals: tokenSupply.value.decimals,
            circulating_supply: tokenInfo.data.circulatingSupply,
            market_cap: tokenInfo.data.marketCap,
            price_usd: tokenInfo.data.priceUsdt,
            trading_volume: tokenInfo.data.volumeUsdt,
            freeze: tokenInfo.data.freezeAuthority ? true : false,
            mint: tokenInfo.data.mintAuthority ? true : false,
            top_holders: [], // سنقوم بجلبها لاحقًا
            audit_results: {
                security_audit: tokenInfo.data.securityAudit || 'N/A', // إذا كانت متاحة
                contract_verified: tokenInfo.data.verified,
                developer_team: tokenInfo.data.developerTeam || 'N/A', // إذا كانت متاحة
            },
            token_rating: {
                community: tokenInfo.data.communityRating || 'N/A', // إذا كانت متاحة
                liquidity: tokenInfo.data.liquidityRating || 'N/A', // إذا كانت متاحة
                project_quality: tokenInfo.data.projectQualityRating || 'N/A', // إذا كانت متاحة
            },
            jito: jito, // إضافة حقل "jito"
        };

        // جلب أعلى 5 حاملين للتوكن
        const holdersResponse = await fetch(`https://public-api.solscan.io/token/holders?tokenAddress=${address}&limit=5`);
        const holdersData = await holdersResponse.json();
        if (holdersData.success !== false) {
            result.top_holders = holdersData.data.map(holder => holder.owner);
        }

        console.log(JSON.stringify(result));
    } catch (error) {
        console.error(JSON.stringify({ error: error.message }));
        process.exit(1);
    }
}

checkToken(tokenAddress); */
