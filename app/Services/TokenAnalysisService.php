<?php
// TokenAnalysisService.php
//C:\xampp\htdocs\work\CryptoChecker1\app\Services\TokenAnalysisService.php

namespace App\Services;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TokenAnalysisService
{
    protected $client;
    protected $apiUrl;
    protected $apiKey;
    protected $solAut;
    protected $cookie;

    public function __construct()
    {
        $this->apiUrl  = config('services.solscan.api_url');
        $this->apiKey  = config('services.solscan.api_key');
        $this->solAut  = config('services.solscan.sol_aut');
        $this->cookie  = config('services.solscan.cookie');

        // تحقق من قيمة $this->apiBaseUrl
        /* if (empty($this->apiBaseUrl)) {
            throw new \Exception('Base URI is not set for Solscan API.');
        } */

        if (empty($this->apiKey)) {
            throw new \Exception('API Key is not set for Solscan API.');
        }

        /* $this->client = new Client([
            // 'base_uri' => 'https://api-v2.solscan.io',
            'base_uri' => 'https://public-api.solscan.io',
            'timeout'  => 30.0,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                // 'Authorization' => 'Bearer ' . $this->apiKey,
                // 'X-API-Key'     => $this->getApiKey(),
                'X-API-Key'     => env('SOLSCAN_API_KEY'),
                // 'token'         => $this->apiKey, // استخدام 'token' في الرؤوس
                // 'User-Agent'    => 'YourAppName/1.0', // استبدلها باسم تطبيقك
                'User-Agent'    => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'Referer'       => 'https://solscan.io/',
                'Origin'        => 'https://solscan.io',
            ],
        ]); */

        $this->client = new Client([
            'base_uri' => 'https://api-v2.solscan.io',
            'timeout'  => 30.0,
            'headers' => [
                'Host'             => 'api-v2.solscan.io',
                'Connection'       => 'keep-alive',
                'Accept'           => 'application/json, text/plain, */*',
                'User-Agent'       => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'Origin'           => 'https://solscan.io',
                'Referer'          => 'https://solscan.io/',
                'Accept-Encoding'  => 'gzip, deflate, br, zstd',
                'Accept-Language'  => 'en-US,en;q=0.9',
                // إضافة 'sol-aut' و 'Cookie'
                // 'sol-aut'          => env('SOLSCAN_SOL_AUT'),
                // 'Cookie'           => env('SOLSCAN_COOKIE'),
                'sol-aut'          => $this->solAut, // استخدام المتغير الصحيح
                'Cookie'           => $this->cookie,  // استخدام المتغير الصحيح
            ],
        ]);

    }

    /**
     * تحليل العملة باستخدام Solscan API.
     *
     * @param string $tokenAddress
     * @return array|null
     * @throws \Exception
     */
    public function analyze($tokenAddress)
    {
        try {
            /* // جلب معلومات التوكن الأساسية باستخدام GET
            $response = $this->client->get('/token/meta', [
                'headers' => [
                    // 'X-API-Key' => $this->getApiKey(),
                    'token'         => $this->apiKey, // استخدام 'token' في الرؤوس
                    // 'User-Agent'    => 'YourAppName/1.0', // استبدلها باسم تطبيقك
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                    'Referer' => 'https://solscan.io/',
                    'Origin' => 'https://solscan.io',
                ],
                'query' => [
                    'tokenAddress' => $tokenAddress,
                ],
            ]);       
            Log::info('Solscan API Response: ' . $response->getBody()); */

            /* // جلب معلومات التوكن الأساسية باستخدام POST
            $response = $this->client->post('/api/v1.0/market/token', [
                'json' => [
                    'token_address' => $tokenAddress,
                ],
            ]); */


            // التحقق من صحة عنوان التوكن
            if (!$this->isValidTokenAddress($tokenAddress)) {
                throw new \Exception('Invalid token address format.');
            }

            // جلب معلومات التوكن الأساسية باستخدام GET
            $response = $this->client->get('/v2/account', [
                'query' => [
                    'address' => $tokenAddress,
                    // 'tokenAddress' => $tokenAddress,
                ],
            ]);

            $tokenInfo = json_decode($response->getBody(), true);

            Log::info('Solscan API Response: ' . $response->getBody());

            // $tokenInfo = json_decode($response->getBody(), true);

            if (!$tokenInfo || isset($tokenInfo['error'])) {
                throw new \Exception('Token not found on Solscan.');
            }

            // تحقق من نجاح الاستجابة
            if (isset($tokenInfo['code']) && $tokenInfo['code'] !== 0) {
                throw new \Exception('Error from Solscan API: ' . ($tokenInfo['message'] ?? 'Unknown error'));
            }

            $tokenData = $tokenInfo['data'] ?? [];

            // جلب قائمة الحاملين (Top Holders)
            $holdersResponse = $this->client->post('/token/holders', [
                'query' => [
                    // 'token_address' => $tokenAddress,
                    'address' => $tokenAddress,
                    'offset'       => 0,
                    'limit'        => 5,
                ],
            ]);

            $holdersData = json_decode($holdersResponse->getBody(), true);

            if (!$holdersData || $holdersData['code'] !== 0) {
                throw new \Exception('Error fetching token holders: ' . ($holdersData['message'] ?? 'Unknown error'));
            }

            $topHolders = [];
            if (isset($holdersData['data']['result'])) {
                $topHolders = array_map(function ($holder) {
                    return $holder['owner'];
                }, $holdersData['data']['result']);
            }

            // إعداد النتيجة النهائية
            $result = [
                'name'     => $tokenInfo['data']['tokenInfo']['name'] ?? 'N/A',
                'symbol'   => $tokenInfo['data']['tokenInfo']['symbol'] ?? 'N/A',
                // 'name'               => $tokenData['token_symbol'] ?? 'N/A',
                // 'symbol'             => $tokenData['token_symbol'] ?? 'N/A',
                'network'            => 'Solana',
                'total_supply'       => $tokenData['token_supply'] ?? 'N/A',
                'decimals'           => $tokenData['token_decimals'] ?? 'N/A',
                'circulating_supply' => $tokenData['circulating_supply'] ?? 'N/A',
                'market_cap'         => $tokenData['market_cap'] ?? 'N/A',
                'price_usd'          => $tokenData['price_usd'] ?? 'N/A',
                'trading_volume'     => $tokenData['volume_24h'] ?? 'N/A',
                'liquidity'          => $tokenData['liquidity'] ?? 'N/A',
                'freeze'             => $tokenData['freeze'] ?? false,
                'mint'               => $tokenData['mint'] ?? false,
                'logo_url'           => $tokenData['icon'] ?? asset('website/images/default-token.png'),
                'top_holders'        => $topHolders,
                'audit_results'      => [
                    'security_audit'    => $tokenData['security_audit'] ?? 'N/A',
                    'contract_verified' => $tokenData['verified'] ?? false,
                    'developer_team'    => $tokenData['team'] ?? 'N/A',
                ],
                'token_rating'       => [
                    'community'       => $tokenData['community_score'] ?? 'N/A',
                    'liquidity'       => $tokenData['liquidity_score'] ?? 'N/A',
                    'project_quality' => $tokenData['project_score'] ?? 'N/A',
                ],
                'jito'               => $tokenData['jito'] ?? 'N/A',
            ];

            return $result;
        } catch (\Exception $e) {
            Log::error('Error fetching token analysis: ' . $e->getMessage());
            throw new \Exception('Error fetching token analysis: ' . $e->getMessage());
        }

        /* catch (\Exception $e) {
            if ($e->hasResponse()) {
                $responseBody = $e->getResponse()->getBody()->getContents();
                Log::error('Solscan API Error Response: ' . $responseBody);
            }
            Log::error('Error fetching token analysis: ' . $e->getMessage());
            throw new \Exception('Error fetching token analysis: ' . $e->getMessage());
        } */

    }

      /**
     * التحقق من صحة عنوان التوكن.
     *
     * @param string $tokenAddress
     * @return bool
     */
    private function isValidTokenAddress($tokenAddress)
    {
        // التحقق من أن العنوان يتكون من 44 حرفًا ويحتوي على أحرف وأرقام فقط
        return preg_match('/^[A-Za-z0-9]{44}$/', $tokenAddress);
    }
    
    
    
   /*
     /**
     * تحليل العملة باستخدام سكريبت Node.js.
     *
     * @param string $tokenAddress
     * @return array|null
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     */
    // public function analyze($tokenAddress)
    // {
    //     $scriptPath = base_path('node_scripts/solanaChecker.js');

    //     $process = new Process(['node', $scriptPath, $tokenAddress]);
    //     $process->setTimeout(60); // تعيين وقت الانتظار إلى 60 ثانية
    //     $process->run();

    //     // تحقق من نجاح العملية
    //     if (!$process->isSuccessful()) {
    //         throw new ProcessFailedException($process);
    //     }

    //     $output = $process->getOutput();
    //     $result = json_decode($output, true);

    //     if (json_last_error() !== JSON_ERROR_NONE) {
    //         throw new \Exception('Invalid JSON response from Node.js script.');
    //     }

    //     if (isset($result['error'])) {
    //         throw new \Exception($result['error']);
    //     }

    //     return $result;



        // قم بكتابة منطق تحليل التوكن هنا
        // يمكن استخدام `@solana/web3.js` من خلال Node.js وتشغيله باستخدام Symfony Process
        // أو يمكنك استخدام APIs مثل Solscan

        // مثال:
       /*  $analysisResult = [
            'name' => 'Token Name',
            'symbol' => 'SYM',
            'network' => 'Solana',
            // باقي البيانات...
        ]; */

        // return $analysisResult;
        

        // تنفيذ السكريبت والحصول على الناتج
        // $output = shell_exec($command);

        // التحقق من وجود ناتج
        /* if ($output) {
            $result = json_decode($output, true);
            return $result;
        }

        return null; */
    // } */
    
}
