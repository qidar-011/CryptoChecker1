<?php
// app/Services/SolanaService.php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Exception;

class SolanaService
{
    protected $client;

    public function __construct()
    {
        // إذا كنت تستخدم مزود خدمة RPC، استخدم عنوان نقطة النهاية الخاصة بهم
        $this->client = new Client([
            'base_uri' => 'https://api.mainnet-beta.solana.com', // أو عنوان مزود الخدمة مثل QuickNode
            'timeout'  => 30.0,
        ]);
    }

    /**
     * الحصول على بيانات المعاملة باستخدام Solana RPC API.
     *
     * @param string $transactionSignature
     * @return array
     * @throws Exception
     */
    public function getTransactionData($transactionSignature)
    {
        try {
            $response = $this->client->post('', [
                'json' => [
                    'jsonrpc' => '2.0',
                    'id'      => 1,
                    'method'  => 'getTransaction',
                    'params'  => [
                        $transactionSignature,
                        'jsonParsed'
                    ],
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (!isset($data['result'])) {
                throw new Exception('Transaction not found.');
            }

            return $data['result'];
        } catch (Exception $e) {
            Log::error('Error fetching transaction data: ' . $e->getMessage());
            throw new Exception('Error fetching transaction data: ' . $e->getMessage());
        }
    }

    /**
     * استخراج العناوين من بيانات المعاملة.
     *
     * @param array $data
     * @return array
     */
    public function extractAddresses($data)
    {
        $addresses = [];

        if (isset($data['transaction']['message']['accountKeys']) && is_array($data['transaction']['message']['accountKeys'])) {
            foreach ($data['transaction']['message']['accountKeys'] as $key) {
                if (isset($key['pubkey'])) {
                    $addresses[] = $key['pubkey'];
                }
            }
        }

        return $addresses;
    }

    /**
     * استخراج عنوان الأساس (base_address) من بيانات المعاملة.
     *
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function extractBaseAddress($data)
    {
        if (isset($data['transaction']['message']['accountKeys'][0]['pubkey'])) {
            return $data['transaction']['message']['accountKeys'][0]['pubkey'];
        }
        throw new Exception('Base address not found in transaction data.');
    }

    /**
     * حساب السيولة من بيانات المعاملة.
     *
     * @param array $data
     * @return float
     * @throws Exception
     */
    public function calculateLiquidity($data)
    {
        if (isset($data['meta']['postTokenBalances']) && is_array($data['meta']['postTokenBalances'])) {
            $change_amounts = [];
            foreach ($data['meta']['postTokenBalances'] as $balance) {
                if (isset($balance['uiTokenAmount']['uiAmount'])) {
                    $change_amounts[] = $balance['uiTokenAmount']['uiAmount'];
                }
            }
            // تأكد من وجود الفهرس المطلوب بناءً على البيانات
            if (isset($change_amounts[2])) { // قد تحتاج إلى تعديل الفهرس بناءً على بياناتك
                $liquidity = floatval($change_amounts[2]);
                return $liquidity / 1000000000;
            } else {
                throw new Exception('Liquidity data index not found.');
            }
        }
        throw new Exception('Liquidity not found in transaction data.');
    }

    /**
     * التحقق من الجمود (freezeAuthority) باستخدام Solana RPC API.
     *
     * @param string $tokenAddress
     * @return bool
     */
    public function freezeAuth($tokenAddress)
    {
        try {
            $response = $this->client->post('', [
                'json' => [
                    'jsonrpc' => '2.0',
                    'id'      => 1,
                    'method'  => 'getAccountInfo',
                    'params'  => [
                        $tokenAddress,
                        [
                            'encoding' => 'jsonParsed'
                        ]
                    ],
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (!isset($data['result']['value'])) {
                throw new Exception('Account not found.');
            }

            return isset($data['result']['value']['data']['parsed']['info']['freezeAuthority']) && $data['result']['value']['data']['parsed']['info']['freezeAuthority'] !== null;
        } catch (Exception $e) {
            Log::error('Error fetching freeze authority: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * التحقق من الحزمة (bundle) باستخدام API خارجي.
     *
     * @param string $transactionSignature
     * @return bool
     */
    public function checkBundle($transactionSignature)
    {
        try {
            $url = "https://explorer.jito.wtf/wtfrest/api/v1/bundles/transaction/{$transactionSignature}";
            $headers = [
                'Connection'       => 'keep-alive',
                'sec-ch-ua'        => '"Not)A;Brand";v="99", "Google Chrome";v="127", "Chromium";v="127"',
                'sec-ch-ua-mobile' => '?0',
                'User-Agent'       => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
                'sec-ch-ua-platform'=> '"Windows"',
                'Accept'           => '*/*',
                'Sec-Fetch-Site'   => 'same-origin',
                'Sec-Fetch-Mode'   => 'cors',
                'Sec-Fetch-Dest'   => 'empty',
                'Referer'          => 'https://explorer.jito.wtf/bundle-explorer',
                'Accept-Language'  => 'en-US,en;q=0.9,ar;q=0.8,hmn;q=0.7',
            ];

            $client = new Client([
                'timeout' => 10.0,
                'headers' => $headers,
            ]);

            $response = $client->get($url);
            $data = $response->getBody()->getContents();

            return strpos($data, 'Bundle not found') === false;
        } catch (Exception $e) {
            Log::error('Error checking bundle: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * تحليل المعاملة باستخدام Solana RPC API.
     *
     * @param string $transactionSignature
     * @return array|null
     * @throws Exception
     */
    public function analyzeTransaction($transactionSignature)
    {
        try {
            // جلب بيانات المعاملة
            $data = $this->getTransactionData($transactionSignature);

            // استخراج العناوين والمعلومات المطلوبة
            $addresses = $this->extractAddresses($data);
            if (count($addresses) < 3) {
                throw new Exception('Insufficient token addresses found.');
            }
            $pair_address = $addresses[2];

            $base_address = $this->extractBaseAddress($data);

            // حساب السيولة (liquidity)
            $liquidity = $this->calculateLiquidity($data);

            // التحقق من الجمود والحزمة
            $freeze_result = $this->freezeAuth($base_address);
            $bundle_result = $this->checkBundle($transactionSignature);

            // إعداد النتيجة النهائية
            $result = [
                'base_address' => $base_address,
                'freeze'       => $freeze_result,
                'bundle'       => $bundle_result,
                'liquidity'    => $liquidity,
            ];

            return $result;

        } catch (Exception $e) {
            Log::error('Error fetching transaction analysis: ' . $e->getMessage());
            throw new Exception('Error fetching transaction analysis: ' . $e->getMessage());
        }
    }
}
