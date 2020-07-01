<?php
    require_once('Color.class.php');

    class Vertex {
        public static $verbose = false;

        public static function doc() {
            $file = get_class() . '.doc.txt';
            if (file_exists($file))
                return file_get_contents($file);
            return 'File doesn\'t exists';
        }

        private $_x = 0;
        private $_y = 0;
        private $_z = 0;
        private $_w = 1.0;
        private $_color;

        public function __construct($args=[]) {
            $this->setX((float)$args['x']);
            $this->setY((float)$args['y']);
            $this->setZ((float)$args['z']);
            $this->_w = isset($args['w']) ? (float)$args['w'] : 1.0;
            $this->_color = isset($args['color']) ? $args['color'] : new Color(["red" => 255, "green" => 255, "blue" => 255]);

            if (self::$verbose)
                echo $this . " constructed\n";
        }

        public function __destruct() {
            if (self::$verbose)
                echo $this . " destructed\n";
        }

        public function __toString() {
            if (self::$verbose) {
                return sprintf(
                    "%s( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", 
                    get_class(), $this->_x, $this->_y, $this->_z, $this->_w, $this->_color
                );
            }
            return sprintf(
                "%s( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", 
                get_class(), $this->_x, $this->_y, $this->_z, $this->_w
            );
        }

        public function getX() {
            return $this->_x;
        }

        public function setX(float $x) {
            $this->_x = $x;
            return;
        }

        public function getY() {
            return $this->_y;
            ;
        }

        public function setY(float $y) {
            $this->_y = $y;
            return;
        }

        public function getZ() {
            return $this->_z;
        }

        public function setZ(float $z) {
            $this->_z = $z;
            return;
        }

        public function getW() {
            return $this->_w;
        }

        public function setW(float $w) {
            $this->_w = $w;
            return;
        }

        public function getColor() {
            return $this->_color;
        }

        public function setColor(Color $color) {
            $this->_color = $color;
            return;
        }
    }
?>