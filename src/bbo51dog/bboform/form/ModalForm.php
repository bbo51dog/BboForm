<?php

namespace bbo51dog\bboform\form;

use bbo51dog\bboform\element\Button;
use pocketmine\Player;

class ModalForm extends FormBase {

    /** @var string */
    private $content = "";

    /** @var Button */
    private $button1;

    /** @var Button */
    private $button2;

    /**
     * ModalForm constructor.
     *
     * @param Button $button1
     * @param Button $button2
     */
    public function __construct(Button $button1, Button $button2) {
        $this->button1 = $button1;
        $this->button2 = $button2;
    }

    /**
     * @inheritDoc
     */
    final public function handleResponse(Player $player, $data): void {
        if (!is_bool($data)) {
            return;
        }
        if ($data) {
            $button = $this->button1;
        } else {
            $button = $this->button2;
        }
        $button->handleSubmit($player);
        $this->handleSubmit($player);
    }

    public function getType(): string {
        return self::TYPE_MODAL;
    }

    /**
     * @inheritDoc
     */
    public function serializeContent() {
        return $this->content;
    }

    public function jsonSerialize(): array {
        $data = parent::jsonSerialize();
        $data["button1"] = $this->button1->getText();
        $data["button2"] = $this->button2->getText();
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
     * @return ModalForm
     */
    public function setText(string $content): self {
        $this->content = $content;
        return $this;
    }

    /**
     * @return Button
     */
    public function getButton1(): Button {
        return $this->button1;
    }

    /**
     * @return Button
     */
    public function getButton2(): Button {
        return $this->button2;
    }
}