<?php

namespace bbo51dog\bboform\element;

use Closure;
use pocketmine\Player;

class ClosureButton extends Button {

    /** @var Closure */
    private $closure;

    /**
     * ClosureButton constructor.
     *
     * @param string $text
     * @param ButtonImage|null $image
     * @param Closure $closure
     */
    public function __construct(string $text, ?ButtonImage $image, Closure $closure) {
        parent::__construct($text, $image);
        $this->closure = $closure;
    }

    public function handleSubmit(Player $player): void {
        ($this->closure)($player, $this);
    }
}