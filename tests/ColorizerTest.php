<?php
/**
 * Created by PhpStorm.
 * Author: mickael-dev
 * File: ColorizerTest.php
 * Created: 10/03/2020 19:50
 */

declare(strict_types=1);

namespace CliColorizer\Tests;

use CliColorizer\Colorizer;
use PHPUnit\Framework\TestCase;

class ColorizerTest extends TestCase
{
    public function test_set_background_color(): void
    {
        $colorizer = new Colorizer();
        $colorizer->setBackgroundColor($colorizer::BACKGROUND_MAGENTA, 'magenta');
        $this->assertSame('magenta', $colorizer->getBackgroundText());
    }
}
