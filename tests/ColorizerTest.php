<?php
/**
 * Created by PhpStorm.
 * Author: mickael-dev
 * File: ColorizerTest.php
 * Created: 10/03/2020 19:50
 */

declare(strict_types=1);

namespace Louzet\Colorizer\Tests;

use PHPUnit\Framework\TestCase;
use Louzet\Colorizer\Colorizer;

class ColorizerTest extends TestCase
{
    public function test_setbackground_color(): void
    {
        $colorizer = new Colorizer();
        $colorizer->setBackgroundColor($colorizer::BACKGROUND_MAGENTA, 'magenta');
        $this->assertSame('magenta', $colorizer->getBackgroundText());
    }
}
