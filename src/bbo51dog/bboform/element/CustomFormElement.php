<?php

namespace bbo51dog\bboform\element;

use pocketmine\Player;

abstract class CustomFormElement implements Element {

    public const TYPE_DROPDOWN = "dropdown";
    public const TYPE_INPUT = "input";
    public const TYPE_LABEL = "label";
    public const TYPE_SLIDER = "slider";
    public const TYPE_STEP_SLIDER = "step_slider";
    public const TYPE_TOGGLE = "toggle";

    private $value;

    /**
     * Do not call this method from your plugin
     *
     * @param $value
     */
    final public function setValue($value){
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    public function handleSubmit(Player $player) {

    }
}