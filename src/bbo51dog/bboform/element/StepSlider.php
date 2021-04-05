<?php

namespace bbo51dog\bboform\element;

class StepSlider implements CustomFormElement {

    /** @var string */
    private $text;

    /** @var string[] */
    private $steps;

    /** @var int|null */
    private $default;

    /**
     * StepSlider constructor.
     *
     * @param string $text
     * @param string[] $steps
     * @param int|null $default
     */
    public function __construct(string $text, array $steps, ?int $default = null) {
        $this->text = $text;
        $this->steps = $steps;
        $this->default = $default;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array {
        $data = [
            "type" => self::TYPE_STEP_SLIDER,
            "text" => $this->text,
            "steps" => $this->steps,
        ];
        if ($this->default !== null) {
            $data["default"] = $this->default;
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string[]
     */
    public function getSteps(): array {
        return $this->steps;
    }

    /**
     * @return int|null
     */
    public function getDefault(): ?int {
        return $this->default;
    }
}