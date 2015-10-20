<?php


class AbsEvent {

    protected $name;
    protected $message;
    protected $picture;

    public function __construct(AbsTown $town){}

    public function action(AbsTown $town){}

    //Getters

    public function getName()
    {
        return $this->name;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    //Setters

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


}