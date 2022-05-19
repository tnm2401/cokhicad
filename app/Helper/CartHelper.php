<?php
namespace App\Helper;
use Session;

/**
 *
 */
class CartHelper
{
	public $items = [];
	public $total_quantity = 0;
	public $total_price = 0;

	function __construct()
	{
		$this->items = session('cart') ? session('cart') : [];
		$this->total_quantity = $this->get_total_quantity();
		$this->total_price = $this->get_total_price();
	}
	public function add($product, $quantity = 1){
		// dd($product); // kiem tra xem da co du lieu san pham them vao chua
		$item = [
			'id' => $product->id,
			'name' => $product->translations->name,
			'sale_price' => $product->selling_price,
			'img' => $product->img,
			'quantity' => $quantity
		];
		// dd($item); // mang 1 chieu
		if (isset($this->items[$product->id])) {
			$this->items[$product->id]['quantity'] += $quantity;
		}else{
			$this->items[$product->id] = $item;
		}
		session(['cart' => $this->items]);
		// dd($this->items); // mang 2 chieu
	}

	public function remove($id){
		if (isset($this->items[$id])) {
			unset($this->items[$id]);
		}
		session(['cart' => $this->items]);

		if(session(['cart' => $this->items]) == ''){
			if (request()->session()->exists('fee')) {
				request()->session()->forget('fee');
			}
			if (request()->session()->exists('coupon')) {
				request()->session()->forget('coupon');
			}
		}
	}

	public function update($id,$quantity = 1){
		if (isset($this->items[$id])) {
			$this->items[$id]['quantity'] = $quantity;
		}
		session(['cart' => $this->items]);
	}

	public function clear(){
		session(['cart' => '']);
		if (Session::get('cart') == '') {
			if (request()->session()->exists('fee')) {
				request()->session()->forget('fee');
			}
			if (request()->session()->exists('coupon')) {
				request()->session()->forget('coupon');
			}
		}
	}

	private function get_total_price(){
		$t = 0;
		foreach ($this->items as $item) {
			$t += $item['sale_price']*$item['quantity'];
		}
		return $t;
	}

	private function get_total_quantity(){
		$t = 0;
		foreach ($this->items as $item) {
			$t += $item['quantity'];
		}
		return $t;
	}
}
?>