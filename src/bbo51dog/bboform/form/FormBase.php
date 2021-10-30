<?php

namespace bbo51dog\bboform\form;

use pocketmine\form\Form;
use pocketmine\Player;

abstract class FormBase implements Form {

    public const TYPE_SIMPLE = "form";
    public const TYPE_MODAL = "modal";
    public const TYPE_CUSTOM = "custom_form";

    /** @var string */
    private $title = "";

    abstract public function getType(): string;

    /**
     * @return string|array
     */
    abstract public function serializeContent();

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        return [
            "type" => $this->getType(),
            "title" => $this->getTitle(),
            "content" => $this->serializeContent(),
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     * @return FormBase
     */
    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            $this->handleClosed($player);
        }
    }

    /**
     * Called when form is submitted
     * @param Player $player
     */
    public function handleSubmit(Player $player): void {

    }

    /**
     * Called when form is closed without submit
     * @param Player $player
     */
    public function handleClosed(Player $player): void {

    }
}