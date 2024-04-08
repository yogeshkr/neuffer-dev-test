<?php
declare(strict_types=1);

namespace Processors;

use Interfaces\LoggerInterface;
use Interfaces\OperationInterface;

class FileProcessor
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function process(string $file, OperationInterface $operation): void
    {
        $this->logger->log(sprintf("Started %s", $operation->getClassName()));

        $fp = fopen($file, "r");
        if (!$fp) {
            throw new \RuntimeException("File could not be opened.");
        }
        while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {
            $a = (int) preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data[0]);
            $b = (int) preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data[1]);
            if ($operation->isValid($a, $b)) {
                try {
                    $result = $operation->execute($a, $b);
                    if ($result !== null) {
                        $this->writeResult($a, $b, $result);
                    }
                } catch (\InvalidArgumentException $e) {
                    $this->logger->log("Error: " . $e->getMessage());
                }
            } else {
                $this->logger->log(sprintf("numbers are %d and %d are wrong:", $a, $b));
            }
        }
        fclose($fp);
        $this->logger->log(sprintf("Finished %s \n", $operation->getClassName()));
    }

    private function writeResult(int $a, int $b, int $result): void
    {
        $fp = fopen("result/result.csv", "a+");
        if (!$fp) {
            throw new \RuntimeException("Result file could not be opened.");
        }
        $data = "$a;$b;$result\n";
        fwrite($fp, $data);
        fclose($fp);
    }
}
