<?php
    class Jaime extends Lannister{
        private $no = "Not even if I'm drunk !";
        private $yes = "Let's do this.";
        private $maybe = "With pleasure, but only in a tower in Winterfell, then.";

        public function sleepWith($person){
            if (get_class($person) == 'Tyrion')
                print($this->no. PHP_EOL);
            else if (get_class($person) == 'Sansa')
                print($this->yes. PHP_EOL);
            else if (get_class($person) == 'Cersei')
                print($this->maybe. PHP_EOL);
        }
    }
?>