<?php


class Nothing extends AbsEvent {

    public function __construct(AbsTown $town) {
        $this->setName('Rien à Signaler');
        $this->setMessage('Tout se passe dans le meilleur des mondes.');
        $this->setPicture('../layout/img/nothing.png');
    }

    public function action(AbsTown $town) {

    }
}