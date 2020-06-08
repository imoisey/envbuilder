<?php

declare(strict_types=1);

namespace Imoisey\Envbuilder;

class EnvBuilder
{
    /** @var array */
    private $variables = [];

    public function add(string $name, string $value): self
    {
        $name = $this->replaceSpaceInVariable($name);
        $this->variables[$name] = $value;

        return $this;
    }

    /**
     * Building to file
     *
     * @param string $filepath
     * @return bool
     */
    public function build(string $filepath): bool
    {
        $variables = $this->variables;

        array_walk($variables, static function (&$value, $name) {
            $value = sprintf('%s=%s', $name, $value);
        });

        $exportContent = implode("\n", $variables);

        if (file_put_contents($filepath, $exportContent)) {
            return true;
        }

        throw new \RuntimeException('Build error!');
    }

    /**
     * Replace space in variable name
     *
     * @param string $name
     * @return string
     */
    private function replaceSpaceInVariable(string $name): string
    {
        return str_replace(' ', '_', $name);
    }
}