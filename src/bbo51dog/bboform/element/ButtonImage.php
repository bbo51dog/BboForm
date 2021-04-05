<?php

namespace bbo51dog\bboform\element;

use JsonSerializable;

class ButtonImage implements JsonSerializable {

    public const TYPE_PATH = "path";
    public const TYPE_URL = "url";

    /** @var string */
    private $type;

    /** @var string */
    private $data;

    /**
     * ButtonImage constructor.
     *
     * @param string $type
     * @param string $data
     */
    public function __construct(string $type, string $data) {
        $this->type = $type;
        $this->data = $data;
    }

    public static function createPathImage(string $path): self {
        return new ButtonImage(self::TYPE_PATH, $path);
    }

    public static function createUrlImage(string $url): self {
        return new ButtonImage(self::TYPE_URL, $url);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        return [
            "type" => $this->type,
            "data" => $this->data,
        ];
    }
}