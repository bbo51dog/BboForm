<?php

namespace bbo51dog\bboform\element;

class Toggle extends CustomFormElement {

    /** @var string */
    private $text;

    /** @var bool */
    private $default;

    /**
     * Toggle constructor.
     *
     * @param string $text
     * @param bool $default
     */
    public function __construct(string $text, bool $default = false) {
        $this->text = $text;
        $this->default = $default;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        return [
            "type" => self::TYPE_TOGGLE,
            "text" => $this->text,
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
     * @return bool
     */
    public function getDefault(): bool {
        return $this->default;
    }

    /**
     * @return bool
     */
    public function getValue(): bool {
        return parent::getValue();
    }
}