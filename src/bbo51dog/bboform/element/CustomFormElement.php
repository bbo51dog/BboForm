<?php

namespace bbo51dog\bboform\element;

interface CustomFormElement extends Element {

    public const TYPE_DROPDOWN = "dropdown";
    public const TYPE_INPUT = "input";
    public const TYPE_LABEL = "label";
    public const TYPE_SLIDER = "slider";
    public const TYPE_STEP_SLIDER = "step_slider";
    public const TYPE_TOGGLE = "toggle";
}