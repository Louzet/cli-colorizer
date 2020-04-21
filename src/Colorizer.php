<?php

namespace CliColorizer;

class Colorizer implements ColorizerInterface
{

    public const FOREGROUND_BLACK     = '0;30';
    public const FOREGROUND_RED       = '0;31';
    public const FOREGROUND_GREEN     = '0;32';
    public const FOREGROUND_BROWN     = '0;33';
    public const FOREGROUND_BLUE      = '0;34';
    public const FOREGROUND_MAGENTA   = '0;35';
    public const FOREGROUND_CYAN      = '0;36';
    public const FOREGROUND_LIGHTGREY = '0;37';
    public const FOREGROUND_DARKGREY  = '1;30';
    public const FOREGROUND_LIGHTRED  = '1;31';
    public const FOREGROUND_LIGHTGREEN = '1;32';
    public const FOREGROUND_YELLOW     = '1;33';
    public const FOREGROUND_LIGHTBLUE  = '1;34';
    public const FOREGROUND_PURPLE     = '1;35';
    public const FOREGROUND_LIGHTCYAN  = '1;36';
    public const FOREGROUND_WHITE      = '1;37';

    public const BACKGROUND_BLACK     = 40;
    public const BACKGROUND_RED       = 41;
    public const BACKGROUND_GREEN     = 42;
    public const BACKGROUND_YELLOW    = 43;
    public const BACKGROUND_BLUE      = 44;
    public const BACKGROUND_MAGENTA   = 45;
    public const BACKGROUND_CYAN      = 46;
    public const BACKGROUND_LIGHTGREY = 47;

    /** @var string */
    protected $foregroundColor;

    /** @var string */
    protected $foregroundText;

    /** @var string */
    protected $backgroundColor;

    /** @var string */
    protected $backgroundText;

    /** @var array  */
    public static $foregroundTexts = [
        '0;30' => 'black',
        '0;31' => 'red',
        '0;32' => 'green',
        '0;33' => 'brown',
        '0;34' => 'blue',
        '0;35' => 'magenta',
        '0;36' => 'cyan',
        '0;37' => 'lightGrey',
        '1;30' => 'darkGrey',
        '1;31' => 'lightRed',
        '1;32' => 'lightGreen',
        '1;33' => 'yellow',
        '1;34' => 'lightBlue',
        '1;35' => 'lightPurple',
        '1;36' => 'lightCyan',
        '1;37' => 'white',
    ];

    /** @var array  */
    public static $backgroundTexts = [
        40 => 'black',
        41 => 'red',
        42 => 'green',
        43 => 'yellow',
        44 => 'blue',
        45 => 'magenta',
        46 => 'cyan',
        47 => 'lightgrey'
    ];

    /**
     * @inheritDoc
     */
    public function color(
        string $sentence,
        string $foreground = null,
        int $background = null,
        bool $endOfLine = false
    ) {
        $this->setForegroundCode($foreground);
        $this->setBackgroundColor($background);

        $sentence = $endOfLine ? $sentence . PHP_EOL : $sentence;

        return $this->doColorize($sentence, [$foreground, $background]);
    }

    /**
     * @param string $foregroundCode
     *
     * @param null   $text
     *
     * @return bool|Colorizer
     */
    public function setForegroundCode(string $foregroundCode, $text = null)
    {
        $this->foregroundColor = $foregroundCode;

        if (!array_key_exists($this->foregroundColor, self::$foregroundTexts)) {
            // todo: throw a custom exception
            return false;
        }

        if (null === $text) {
            $this->foregroundText = self::$foregroundTexts[$foregroundCode] ?? 'unknown foreground color';

            return $this;
        }

        $this->foregroundText = $text;

        return $this;
    }

    /**
     * @param string|int $backgroundColor
     * @param null   $text
     *
     * @return bool|Colorizer
     */
    public function setBackgroundColor($backgroundColor, $text = null)
    {
        if (is_int($backgroundColor)) {
            $backgroundColor = (string) $backgroundColor;
        }
        $this->backgroundColor = $backgroundColor;

        if ($this->backgroundColor < self::BACKGROUND_BLACK || $this->backgroundColor > self::BACKGROUND_LIGHTGREY) {
            // todo: throw a custom exception
            return false;
        }

        if (null === $text) {
            $this->backgroundText = self::$backgroundTexts[$backgroundColor] ?? 'unknown background color';

            return $this;
        }

        $this->backgroundText = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getForegroundColors(): array
    {
        return array_keys(self::$foregroundTexts);
    }

    /**
     * @return array
     */
    public function getBackgroundColors(): array
    {
        return array_keys(self::$backgroundTexts);
    }

    /**
     * @param string $sentence
     * @param array  $arguments
     *
     * @return string
     */
    private function doColorize(string $sentence, array $arguments): string
    {
        $sentence = str_pad($sentence, 15, ' ', STR_PAD_BOTH);
        [$foreground, $background] = $arguments;
        $coloredOutput = '';

        if (array_key_exists($foreground, self::$foregroundTexts)) {
            $coloredOutput .= "\033[" . $foreground . ';';
        } else{
            // todo: throw an exception or set default value
        }

        if (array_key_exists($background, self::$backgroundTexts)) {
            $coloredOutput .= $background . 'm';
        }

        $coloredOutput .= $sentence . "\033[0m";

        return $coloredOutput . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getForegroundText(): string
    {
        return $this->foregroundText;
    }

    /**
     * @return string
     */
    public function getBackgroundText(): string
    {
        return $this->backgroundText;
    }
}
