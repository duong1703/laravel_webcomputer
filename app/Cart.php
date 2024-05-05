<?php
namespace App;
class Cart{
    public $items;
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function AddCart($product, $id){
        $newProduct = ['quantity'=> 0, 'price' => $product->price, 'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        // $newProduct['price'] = ((int)$newProduct['quantity']) * ((int)$product->price);
        $this->products[$id] = $newProduct;
        // $this->totalPrice += array_sum($newProduct);
        $this->totalPrice += array_sum($newProduct);
        $this->products[$id] = $newProduct;
    }

    public function DeleteItemCart($id){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    // Method to remove a product from the cart
    public function removeProduct($productId)
    {
        // Check if the product exists in the cart
        if (array_key_exists($productId, $this->items)) {
            // Remove the product from the cart
            unset($this->items[$productId]);
        }
    }

    public function totalPrice()
    {
        $totalPrice = 0;

        // Loop through each item in the cart and calculate the total price
        foreach ($this->items as $item) {
            $totalPrice += $item['product']->price * $item['quantity'];
        }

        return $totalPrice;
    }
}
