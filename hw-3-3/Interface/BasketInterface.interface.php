<?php
interface BasketInterface
{
    public function getProductsList();
    public function printProductsList();
    public function addToCart($product, $quantity = 1);
    public function deleteFromCart($product);
    public function getTotalSum();
}