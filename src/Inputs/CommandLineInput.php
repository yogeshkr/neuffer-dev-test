<?php
declare(strict_types=1);

namespace Inputs;

class CommandLineInput
{
    public const COMMAND_SUCCESS = 0;
    public const COMMAND_FAILURE = -1;

    /**
     * @return array
     */
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
