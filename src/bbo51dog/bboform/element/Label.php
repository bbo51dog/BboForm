<?php

namespace bbo51dog\bboform\element;

class Label extends CustomFormElement {

    /** @var string */
    private $text;

    /**
     * Label constructor.
     *
     * @param string $text
     */
    public function __construct(string $text) {
        $this->text = $text;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        return [
            "type" => self::TYPE_LABEL,
            "text" => $this->text,
        ];
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return null
     */
    public function getValue() {
        return null;
    }
}