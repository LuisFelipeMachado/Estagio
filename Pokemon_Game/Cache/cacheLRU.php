<?php

class CacheLRU{
    private $capacity;
    private $cache;
    private $order;

    public function __construct($capacity){
        $this->capacity = $capacity;
        $this->cache = [];
        $this->order = [];
    }
    public function get($Key) {
        if (isset($this->cache[$key])) {
            return $this->updateOrder[$key];
        }
        return -1;
        }
       public function put($key, $value){
        if (isset($this->cache[$key])){
            $this->cache[$key] = $value;
            $this->updateOrder($key);
            return;
        }
        if (count($this->cache) >= $this->capacity){
            $this->evict();
        }
        $this->cache[$key];
        $this->order[] = $key;
       }
       public function updateOrder($key) {
        $index = array_search($key, $this->order);
        unset($this->order [index]);
        $this->order[] = $key;
       }
       private function evict(){
        $oldestKey = array_shift($this->order);
        unset($this->cache [$oldestKey]);
       }
    }
    
