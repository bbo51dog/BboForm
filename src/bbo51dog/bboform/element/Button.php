<?php

namespace bbo51dog\bboform\element;

class Button implements SimpleFormElement, ModalFormElement {

    /** @var ButtonImage|null */
    private $image = null;

    /** @var string */
    private $text;

    /**
     * Button constructor.
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
        $data = [
            "text" => $this->text,
        ];
        if ($this->image instanceof ButtonImage) {
            $data["image"] = $this->image->jsonSerialize();
        }
        return $data;
    }

    /**
     * @return ButtonImage|null
     */
    public function getImage(): ?ButtonImage {
        return $this->image;
    }

    /**
     * @param ButtonImage|null $image
     */
    public function setImage(?ButtonImage $image): void {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void {
        $this->text = $text;
    }
}