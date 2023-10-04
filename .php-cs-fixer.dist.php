<?php

declare(strict_types=1);

$header = <<<'EOF'
@project PHP LLM
@link https://github.com/mnavarrocarter/php-llm
@project mnavarrocarter/php-llm
@author Matias Navarro-Carter mnavarrocarter@gmail.com
@license BSD-3-Clause
@copyright 2023 Castor Labs Ltd

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$config = (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude('.php-cs-fixer.dist.php')
    )
;

$cachePath = __DIR__ . '/.dev/var/cache/php-cs-fixer.cache';
$cacheDir = dirname($cachePath);

if (!is_dir($cacheDir) && !@mkdir($cacheDir, 0755, true) && !is_dir($cacheDir)) {
    return $config;
}

return $config->setCacheFile($cachePath);