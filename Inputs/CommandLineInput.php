<?php
declare(strict_types=1);

namespace Inputs;

class CommandLineInput
{
    public static function parseOptions(): array
    {
        $shortopts = "a:f:";
        $longopts = array("action:", "file:");
        $options = getopt($shortopts, $longopts);
        $action = $options['a'] ?? $options['action'] ?? "xyz";
        $file = $options['f'] ?? $options['file'] ?? "notexists.csv";
        return [$action, $file];
    }
}
