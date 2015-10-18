<?php

interface IntEvent {

    public function __construct(Town $town);
    public function action(Town $town);
}