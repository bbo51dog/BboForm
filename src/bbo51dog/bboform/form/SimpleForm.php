<?php

namespace bbo51dog\bboform\form;

use bbo51dog\bboform\element\Button;
use pocketmine\Player;

class SimpleForm extends FormBase {

    /** @var string */
    private $content = "";

    /** @var Button[] */
    private $buttons = [];

    public function addButton(Button $element): self {
        $this->buttons[] = $element;
        return $this;
    }

    public function getType(): string {
        return self::TYPE_SIMPLE;
    }

    final public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            return;
        }
        $this->buttons[$data]->handleSubmit($player);
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
     * @return SimpleForm
     */
    public function setText(string $content): self {
        $this->content = $content;
        return $this;
    }
}