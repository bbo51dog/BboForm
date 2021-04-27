<?php

namespace bbo51dog\bboform\element;

use InvalidArgumentException;

class Slider extends CustomFormElement {

    /** @var string */
    private $text;

    /** @var int */
    private $min;

    /** @var int */
    private $max;

    /** @var int|null */
    private $default;

    /**
     * Slider constructor.
     *
     * @param string $text
     * @param int $min
     * @param int $max
     * @param int|null $default
     */
    public function __construct(string $text, int $min, int $max, ?int $default = null) {
        $this->text = $text;
        if ($min > $max) {
            throw new InvalidArgumentException("max must be more than min");
        }
        $this->min = $min;
        $this->max = $max;
        if ($default !== null && $default < $min or $max < $default) {
            throw new InvalidArgumentException("default was out of range");
        }
        $this->default = $default;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        $data = [
            "type" => self::TYPE_SLIDER,
            "text" => $this->text,
            "min" => $this->min,
            "max" => $this->max,
        ];
        if ($this->default !== null) {
            $data["default"] = $this->default;
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getMin(): int {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax(): int {
        return $this->max;
    }

    /**
     * @return int|null
     */
    public function getDefault(): ?int {
        return $this->default;
    }

    /**
     * @return float
     */
    public function getValue(): float {
        return parent::getValue();
    }
}