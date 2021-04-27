<?php

namespace bbo51dog\bboform\form;

use Closure;
use pocketmine\Player;

class ClosureCustomForm extends CustomForm {

    /** @var Closure */
    private $closure;

    /**
     * ClosureCustomForm constructor.
     *
     * @param Closure $closure
     */
    public function __construct(Closure $closure) {
        $this->closure = $closure;
    }

    public function handleSubmit(Player $player): void {
        ($this->closure)($player);
    }
}