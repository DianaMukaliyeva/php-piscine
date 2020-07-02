<?php
    class Tyrion extends Lannister{
        private $no = "Not even if I'm drunk !";
        private $yes = "Let's do this.";

        public function sleepWith($person){
            if (get_class($person) == 'Jaime')
                print($this->no . PHP_EOL);
            if (get_class($person) == 'Sansa')
                print($this->yes . PHP_EOL);
            if (get_class($person) == 'Cersei')
                print($this->no . PHP_EOL);
        }
    }
?>