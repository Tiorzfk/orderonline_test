<?php

    abstract class Ship {
        protected $name;
        protected $color;
        protected $type;
        protected $yearMade;
        protected $fasilities = [];

        public function __construct($color, $type, $yearMade, $fasilities) {
            $this->color = $color;
            $this->type = $type;
            $this->yearMade = $yearMade;
            $this->fasilities = $fasilities;
        }

        public function setName($name) {
            $this->name = $name;
        }
        
        abstract public function turn_on();
        abstract public function turn_off();
        abstract public function move($direction);
    }

    Class MotorBoats extends Ship {
        private $name_ship = 'Motor Boats';

        public function __construct($color, $type, $yearMade, $fasilities) {
            parent::setName($this->name_ship);
            parent::__construct($color, $type, $yearMade, $fasilities);
        }

        public function move($direction) {
            return $this->name." with type ".$this->type." and color ".$this->color." move to ".$direction;
        }

        public function turn_on() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn on";
        }

        public function turn_off() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn off";
        }
    }

    Class SailBoats extends Ship {
        private $name_ship = 'Sail Boats';

        public function __construct($color, $type, $yearMade, $fasilities) {
            parent::setName($this->name_ship);
            parent::__construct($color, $type, $yearMade, $fasilities);
        }

        public function move($direction) {
            return $this->name." with type ".$this->type." and color ".$this->color." move to ".$direction;
        }

        public function turn_on() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn on";
        }

        public function turn_off() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn off";
        }
    }

    Class YachtsBoats extends Ship {
        private $name_ship = 'Yachts Boats';

        public function __construct($color, $type, $yearMade, $fasilities) {
            parent::setName($this->name_ship);
            parent::__construct($color, $type, $yearMade, $fasilities);
        }

        public function move($direction) {
            return $this->name." with type ".$this->type." and color ".$this->color." move to ".$direction;
        }

        public function turn_on() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn on";
        }

        public function turn_off() {
            return $this->name." with type ".$this->type." and color ".$this->color." turn off";
        }
    }

    $data = new MotorBoats('red', 'S03932', 2023, ['office']);

    echo $data->turn_on().'<br>';
    echo $data->move('left').'<br>';
    echo $data->move('right').'<br>';
    echo $data->move('forward').'<br>';
    echo $data->turn_off().'<br>';

?>