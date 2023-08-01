<?php
class linkedListLibrary
{
    private $head;

    public function __construct(){
        $this->head = null;
    }

    public function isEmpty(){
        return $this->head === null;
    }

    public function add($value){
        if (!is_string($value) && !is_int($value)) {
            throw new Exception("Invalid provide int or string");
        }
        $nodeCreation = new Node($value);

        if ($this->isEmpty() || $value < $this->head->data) {
            $nodeCreation->next = $this->head;
            $this->head = $nodeCreation;
        }else {
            $actual = $this->head;
            while ($actual->next !== null && $value >= $actual->next->data) {
                $actual = $actual->next;
            }
            $nodeCreation->next = $actual->next;
            $actual->next = $nodeCreation;
        }
    }

    public function displayList(){
        $actual = $this->head;
        while ($actual !== null) {
            echo $actual->data . " -> ";
            $actual = $actual->next;
        }
    } 

}
