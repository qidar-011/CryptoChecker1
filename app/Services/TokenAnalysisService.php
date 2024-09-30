<?php

namespace App\Services;

class TokenAnalysisService
{
    /* public function analyze($tokenAddress)
    {
        // تأكد من أن Node.js مسجل في PATH الخاص بالنظام
        $command = 'node ' . escapeshellarg(base_path('node_scripts/solanaChecker.js')) . ' ' . escapeshellarg($tokenAddress);
        $output = shell_exec($command);
        $result = json_decode($output, true);

        // تحقق من وجود خطأ في النتيجة
        if (isset($result['error'])) {
            return ['error' => $result['error']];
        }

        return $result;
    } */

    /* public function analyze($tokenAddress)
    {
        $command = 'node ' . base_path('node_scripts/solanaChecker.js') . ' ' . escapeshellarg($tokenAddress);
        $output = shell_exec($command);
        $result = json_decode($output, true);

        return $result;
    } */

        /**
     * تحليل العملة باستخدام سكريبت Node.js.
     *
     * @param string $tokenAddress
     * @return array|null
     */
    public function analyze($tokenAddress)
    {
        $scriptPath = base_path('node_scripts/solanaChecker.js');
        $command = "node " . escapeshellarg($scriptPath) . " " . escapeshellarg($tokenAddress);

        // تنفيذ السكريبت والحصول على الناتج
        $output = shell_exec($command);

        // التحقق من وجود ناتج
        if ($output) {
            $result = json_decode($output, true);
            return $result;
        }

        return null;
    }
    
}
