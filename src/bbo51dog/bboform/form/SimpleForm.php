<?php

namespace bbo51dog\bboform\form;

use bbo51dog\bboform\element\SimpleFormElement;
use pocketmine\Player;

class SimpleForm extends FormBase {

    /** @var string */
    private $content = "";

    /** @var SimpleFormElement[] */
    private $elements = [];

    /**
     * @param SimpleFormElement $element
     * @return $this
     */
    public function addElement(SimpleFormElement $element): self {
        $this->elements[] = $element;
        return $this;
    }

    /**
     * @param SimpleFormElement ...$elements
     * @return $this
     */
    public function addElements(SimpleFormElement ...$elements): self {
        $this->elements = array_merge($this->elements, $elements);
        return $this;
    }

    public function getType(): string {
        return self::TYPE_SIMPLE;
    }

    final public function handleResponse(Player $player, $data): void {
        parent::handleResponse($player, $data);
        if ($data === null) {
            return;
        }
        $this->elements[$data]->handleSubmit($player);
        $this->handleSubmit($player);
    }

    public function serializeContent() {
        return $this->content;
    }

    public function jsonSerialize(): array {
        $data = parent::jsonSerialize();
        $data["buttons"] = [];
        foreach ($this->elements as $element) {
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