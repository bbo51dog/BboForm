<?php

namespace bbo51dog\bboform\form;

use bbo51dog\bboform\element\SimpleFormElement;
use pocketmine\Player;

class SimpleForm extends FormBase {

    /** @var string */
    private $content = "";

    /** @var SimpleFormElement[] */
    private $buttons = [];

    public function addElement(SimpleFormElement $element): self {
        $this->buttons[] = $element;
        return $this;
    }

    public function getType(): string {
        return self::TYPE_SIMPLE;
    }

    public function handleResponse(Player $player, $data): void {
        // TODO: Implement handleResponse() method.
    }

    public function serializeContent() {
        return $this->content;
    }

    public function jsonSerialize(): array {
        $data = parent::jsonSerialize();
        foreach ($this->buttons as $element) {
            $data["buttons"][] = $element->jsonSerialize();
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setText(string $content): void {
        $this->content = $content;
    }
}