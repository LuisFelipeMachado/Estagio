<?php
  namespace Cache;

    Class cacheFIFO {
        private array $chace;
        private $capacity;

        public function __construct($capacity) {
            $this->cache = [];
            $this->capacity = $capacity;
        }

        public function get($key) {
            if (isset($this->cache[$key])) {
                return $this->cache[$key];
            }
            return null;
    }
        public function set($key, $value){
            if (count($this->cache) >= $this->capacity){
                array_shift($this->cache);
            }
        $this ->cache[$key] = value;
        }
        public function getCache(){
            return $this->cache;
        }
        }


