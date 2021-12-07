<?php

namespace bbo51dog\bboform\element;

use pocketmine\player\Player;

class Button implements SimpleFormElement, ModalFormElement {

    /** @var ButtonImage|null */
    private $image;

    /** @var string */
    private $text;

    /**
     * Button constructor.
     *
     * @param string $text
     * @param ButtonImage|null $image
     */
    public function __construct(string $text, ?ButtonImage $image = null) {
        $this->text = $text;
        $this->image = $image;
    }

    public function handleSubmit(Player $player): void {

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
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}