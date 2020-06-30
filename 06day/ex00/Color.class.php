<?php
    class Color {
        public static bool $verbose = false;

        public int $red = 0;
        public int $green = 0;
        public int $blue = 0;

        public function __construct($args=[]) {
            if (isset($args['rgb'])) {
                $rgb = (int)$args['rgb'];
                $this->red = $rgb / 65281 % 256;
                $this->green= $rgb / 256 % 256;
                $this->blue = $rgb % 256;
            } else {
                $this->red = isset($args['red']) ? (int)$args['red'] : 0;
                $this->green = isset($args['green']) ? (int)$args['green'] : 0;
                $this->blue = isset($args['blue']) ? (int)$args['blue'] : 0;
            }
            if (self::$verbose)
                echo $this . " constructed.\n";
        }

        public function __destruct() {
            if (self::$verbose)
                echo $this . " destructed.\n";
        }

        public function __toString() {
            return sprintf("%s( red: %3d, green: %3d, blue: %3d )", get_class(), $this->red, $this->green, $this->blue);
        }

        public static function doc() {
            $file = get_class() . '.doc.txt';
            if (file_exists($file))
                return file_get_contents($file);
            return 'File doesn\'t exists';
        }

        public function add($inst) {
            $new_instance = new Color([
                'red' => $this->red + $inst->red,
                'green' => $this->green + $inst->green,
                'blue' => $this->blue + $inst->blue
            ]);
            return $new_instance;
        }
        
        public function sub($inst) {
            $new_instance = new Color([
                'red' => $this->red - $inst->red,
                'green' => $this->green - $inst->green,
                'blue' => $this->blue - $inst->blue
            ]);
            return $new_instance;
        }
        
        public function mult($inst) {
            $new_instance = new Color([
                'red' => $this->red * (float)$inst,
                'green' => $this->green * (float)$inst,
                'blue' => $this->blue * (float)$inst
            ]);
            return $new_instance;
        }
    }
?>