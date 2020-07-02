<?php
    class UnholyFactory {
        private $army = array();

        public function absorb($type_sol) {
            if (get_parent_class($type_sol)) {
                if (isset($this->army[$type_sol->getName()])) {
                    print("(Factory already absorbed a fighter of type " . $type_sol->getName() . ")" . PHP_EOL);
                }
                else {
                    print("(Factory absorbed a fighter of type " . $type_sol->getName() . ")" . PHP_EOL);
                    $this->army[$type_sol->getName()] = $type_sol;
                }
            }
            else {
                print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
            }
        }

        public function fabricate($type_sol) {
            if (array_key_exists($type_sol, $this->army)) {
                print("(Factory fabricates a fighter of type " . $type_sol . ")" . PHP_EOL);
                return (clone $this->army[$type_sol]);
            }
            print("(Factory hasn't absorbed any fighter of type " . $type_sol . ")" . PHP_EOL);
            return null;
        }
    }
?>