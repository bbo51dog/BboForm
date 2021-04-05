<?php

namespace bbo51dog\bboform\form;

use bbo51dog\bboform\element\CustomFormElement;
use pocketmine\Player;

class CustomForm extends FormBase {

    /** @var CustomFormElement[] */
    private $elements;

    /**
     * @inheritDoc
     */
    public function handleResponse(Player $player, $data): void {
        // TODO: Implement handleResponse() method.
    }

    public function getType(): string {
        return self::TYPE_CUSTOM;
    }

    /**
     * @inheritDoc
     */
    public function serializeContent() {
        $data = [];
        foreach ($this->elements as $element) {
            $data[] = $element->jsonSerialize();
        }
        return $data;
    }

    public function addElement(CustomFormElement $element): self {
        $this->elements[] = $element;
        return $this;
    }
}