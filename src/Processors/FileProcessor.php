<?php
declare(strict_types=1);

namespace Processors;

use Interfaces\LoggerInterface;
use Interfaces\OperationInterface;

class FileProcessor
{
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * @param string $file
     * @param OperationInterface $operation
     * @return void
     */
    public function process(string $file, OperationInterface $operation): void
    {
        $log[] = sprintf("Started %s \n", $operation->getClassName());
        $fp = fopen($file, "r");
        if (!$fp) {
            throw new \RuntimeException("File could not be opened.");
        }
        while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {
            $a = (int) preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data[0]);
            $b = (int) preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data[1]);
            if ($operation->isValid($a, $b)) {
                $result = $operation->execute($a, $b);
                if ($result !== null) {
                    $csvData[] = [$a, $b, $result];
                }
            } else {
                $log[]= sprintf("numbers are %d and %d are wrong \n", $a, $b);
            }
        }

        if(!empty($csvData)){
            $this->writeResult($csvData);
        }
        fclose($fp);
        $log[] = sprintf("Finished %s \n", $operation->getClassName());
        $this->logger->log($log);
    }

    /**
     * @param array $data
     * @return void
     */
    private function writeResult(array $data): void
    {
        $fp = fopen("result/result.csv", "w");
        if (!$fp) {
            throw new \RuntimeException("Result file could not be opened.");
        }
        foreach ($data as $row) {
            fputcsv($fp, $row, ';');
        }
        fclose($fp);
    }
}
