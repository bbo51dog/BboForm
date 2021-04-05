<?php

namespace bbo51dog\bboform\element;

class Input implements CustomFormElement {

    /** @var string */
    private $text;

    /** @var string */
    private $placeholder;

    /** @var string */
    private $default;

    /**
     * Input constructor.
     *
     * @param string $text
     * @param string $placeholder
     * @param string $default
     */
    public function __construct(string $text, string $placeholder = "", string $default = "") {
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->default = $default;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        return [
            "type" => self::TYPE_INPUT,
            "text" => $this->text,
            "placeholder" => $this->placeholder,
            "default" => $this->default,
        ];
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string {
        return $this->placeholder;
    }

    /**
     * @return string
     */
    public function getDefault(): string {
        return $this->default;
    }
}