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
    final public function handleResponse(Player $player, $data): void {
        parent::handleResponse($player, $data);
        if ($data === null) {
            return;
        }
        foreach ($data as $k => $value) {
            $element = $this->elements[$k];
            $element->setValue($value);
            $element->handleSubmit($player);
        }
        $this->handleSubmit($player);
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

    /**
     * @param CustomFormElement[] $elements
     * @return $this
     */
    public function addElements(array $elements): self {
        $this->elements = array_merge($this->elements, $elements);
        return $this;
    }

    /**
     * @return CustomFormElement[]
     */
    public function getElements(): array {
        return $this->elements;
    }
}