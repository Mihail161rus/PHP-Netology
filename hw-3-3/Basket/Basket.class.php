<?php
namespace Basket;

class Basket implements \BasketInterface
{
    private $productsList = [];

    public function addToCart($product, $quantity = 1)
    {
        if(array_key_exists($product->getCode(), $this->productsList)) {
            $addedProduct = $this->productsList[$product->getCode()];
            $addedProductQuantity = $addedProduct->quantity + $quantity;
            $product->quantity = $addedProductQuantity;
        }
        else {
            $this->productsList[$product->getCode()] = $product;
            $product->quantity = $quantity;
        }
    }

    public function getProductsList()
    {
        if(count($this->productsList) === 0) {
            echo '<h4>Ваша корзина пуста</h4>';
        }
        else {
            echo '<table>';
            echo '<tr>';
            echo '<th>Код товара</th>';
            echo '<th>Категория</th>';
            echo '<th>Наименование товара</th>';
            echo '<th>Цена</th>';
            echo '<th>Количество</th>';
            echo '<th>Сумма</th>';
            echo '</tr>';
            foreach($this->productsList as $product) {
                echo '<tr>';
                echo '<td>' . $product->getCode() . '</td>';
                echo '<td>' . $product->getCategory() . '</td>';
                echo '<td>' . $product->getTitle() . '</td>';
                echo '<td>' . $product->getPrice() . '</td>';
                echo '<td>' . $product->quantity . '</td>';
                echo '<td>' . $product->getPrice() * $product->quantity . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }

    public function getProducts()
    {
        return $this->productsList;
    }
}