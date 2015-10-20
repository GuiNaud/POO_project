<?php

class Migration extends AbsEvent{

    const ARMY = -200;
    const PROSPERITY = -3;

    public function __construct(AbsTown $town) {
        $this->setName('Immigration');
        $this->setMessage('Votre ville attire les habitants des tribus voisines.
                            Vos capacit&eacutes d\'accueil sont au maximumu,
                            et vous employez la force pour repousser les immmigrants.');
        $this->setPicture('../layout/img/migration.png');
    }

    public function action(AbsTown $town) {
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }
}