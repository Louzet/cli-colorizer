<?php
/**
 * Created by PhpStorm.
 * Author: mickael-dev
 * File: ColorizerInterface.php
 * Created: 11/03/2020 18:26
 */

declare(strict_types=1);

namespace Louzet\Colorizer;

interface ColorizerInterface
{
    /**
     * @param string      $sentence
     * @param string|null $foreground
     * @param string|null $background
     * @param bool        $endOfLine
     *
     * @return mixed
     */
    public function color(string $sentence, string $foreground = null, string $background = null, bool $endOfLine = false);
}