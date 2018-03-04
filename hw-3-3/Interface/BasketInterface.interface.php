<?php
interface BasketInterface
{
    //public function getTotalSum();
    public function getProductsList();
    public function addToCart($product, $quantity = 1);
    //public function unsetFromCart();
}