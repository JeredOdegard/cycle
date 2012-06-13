<?php
	class Cycle {
		private $items = array();
		private $count = 0;
		private $index = 0;
		
		function __construct() {
			$this->items = func_get_args();
			$this->count = $this->countItems();
		}
		
		public function getCurrent() {
			if ( $this->count <= 0 ) {
				throw new Exception('There are no items in your list.');
			}
			return $this->items[$this->index++ % $this->count];
		}
		
		public function resetPosition() {
			$this->index = 0;
		}
		
		public function addItem($i) {
			$this->items[] = (string)$i;
			$this->countItems();
		}
		
		public function getItems() {
			return var_dump($this->items);
		}
		
		public function resetItems() {
			$this->items = array();
			$this->resetPosition();
		}
		
		private function countItems() {
			$this->count = count($this->items);
			return count($this->items);
		}
	}
	
	$myCycle = new Cycle();
	$myCycle->addItem('dog');
	$myCycle->addItem('house');
	echo $myCycle->getCurrent() . "\n";
	echo $myCycle->getCurrent() . "\n";
	echo $myCycle->getCurrent() . "\n";
	echo "\n";
	
	$myCycle = new Cycle('meow','box');
	$myCycle->addItem('cat');
	echo $myCycle->getCurrent() . "\n";
	echo $myCycle->getCurrent() . "\n";
	echo $myCycle->getCurrent() . "\n";
	echo $myCycle->getCurrent() . "\n";
?>