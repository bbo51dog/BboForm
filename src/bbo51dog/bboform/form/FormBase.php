<?php

namespace bbo51dog\bboform\form;

use pocketmine\form\Form;

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
}