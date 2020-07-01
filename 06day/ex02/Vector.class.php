<?php
    class Vector {
        public static bool $verbose = false;

        public static function doc() {
            $file = get_class() . '.doc.txt';
            if (file_exists($file))
                return file_get_contents($file);
            return 'File doesn\'t exists';
        }

        private float $_x;
        private float $_y;
        private float $_z;
        private float $_w;

        public function __construct($args=[]) {
            $dest = $args['dest'];
            $start = isset($args['orig']) ? $args['orig'] : new Vertex(['x'=>0, 'y'=>0, 'z'=>0, 'w'=>1]);
            $this->_x = $dest->getX() - $start->getX();
            $this->_y = $dest->getY() - $start->getY();
            $this->_z = $dest->getZ() - $start->getZ();
            $this->_w = $dest->getW() - $start->getW();
            if (self::$verbose)
                echo $this . " constructed\n";
        }

        public function __destruct() {
            if (self::$verbose)
                echo $this . " destructed\n";
        }

        public function __toString() {
            return sprintf(
                "%s( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", 
                get_class(), $this->_x, $this->_y, $this->_z, $this->_w
            );
        }

        public function getX() {
            return $this->_x;
        }
        
        public function getY() {
            return $this->_y;
        }
    
        public function getZ() {
            return $this->_z;
        }
        
        public function getW() {
            return $this->_w;
        }

        public function magnitude() {
            return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2) + pow($this->_w, 2));
        }

        public function normalize() {
            $length = $this->magnitude();
            if ($length == 1) {
                return $this;
            }
            if ($length > 0) {
                $vert = new Vertex([
                    'x' => $this->_x / $length,
                    'y' => $this->_y / $length,
                    'z' => $this->_z / $length
                ]);
                return new Vector(['dest' => $vert]);
            }
        }

        public function add(Vector $rhs) {
            return new Vector(['dest' => new Vertex([
                'x' => $this->_x + $rhs->getX(),
                'y' => $this->_y + $rhs->getY(),
                'z' => $this->_z + $rhs->getZ()
            ])]);
        }
        
        public function sub(Vector $rhs) {
            return new Vector(['dest' => new Vertex([
                'x' => $this->_x - $rhs->getX(),
                'y' => $this->_y - $rhs->getY(),
                'z' => $this->_z - $rhs->getZ()
            ])]);
        }
        
        public function opposite() {
            return new Vector(['dest' => new Vertex([
                'x' => -1 * $this->_x,
                'y' => -1 * $this->_y,
                'z' => -1 * $this->_z
            ])]);
        }
        
        public function scalarProduct($k) {
            return new Vector(['dest' => new Vertex([
                'x' => $k * $this->_x,
                'y' => $k * $this->_y,
                'z' => $k * $this->_z
            ])]);
        }
        
        public function dotProduct(Vector $rhs) {
            return 
                $rhs->getX() * $this->_x + 
                $rhs->getY() * $this->_y + 
                $rhs->getZ() * $this->_z;
        }

        public function cos(Vector $rhs) {
            $len1 = $this->magnitude();
            $len2 = $rhs->magnitude();
            $dot = $this->dotProduct($rhs);
            return $dot/($len1 * $len2);
        }

        public function crossProduct(Vector $rhs) {
            return new Vector(['dest' => new Vertex([
                'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
                'y' => ($this->_x * $rhs->getZ() - $this->_z * $rhs->getX()) * -1,
                'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
            ])]);
        }
    }
?>