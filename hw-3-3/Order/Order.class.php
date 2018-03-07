<?php
namespace Order;

final class Order extends \Basket\Basket
{
    const ORDER_CREATED = 'заказ оформлен';
    const ORDER_DELIVERY = 'заказ передан на доставку';
    const ORDER_DONE = 'заказ выполнен';
    const ORDER_CANCEL = 'заказ отменен';
    protected $orderStatus;
    protected $orderInfoText;
    protected $orderProductList;
    protected $orderNum;

    public function __construct(\Basket\Basket $basket)
    {
        $this->orderProductList = $basket;
    }

    public function changeOrderStatus($id_status)
    {
        if(count($this->orderProductList->getProductsList()) !== 0) {
            switch($id_status){
                case 1:
                    $this->orderStatus = self::ORDER_CREATED;
                    $this->orderInfoText = 'Для того чтобы мы отправили заказ Вам необходимо его оплатить';
                    break;

                case 2:
                    $this->orderStatus = self::ORDER_DELIVERY;
                    $this->orderInfoText = 'Отслеживать статус послыки можно на сайте выбранной транспортной компании';
                    break;

                case 3:
                    $this->orderStatus = self::ORDER_DONE;
                    $this->orderInfoText = 'Спасибо за заказ! Оставьте отзыв о магазине';
                    break;

                case 4:
                    $this->orderStatus = self::ORDER_CANCEL;
                    $this->orderInfoText = 'Для оформления нового заказа добавьте товары в корзину';
            }
        } else {
            $this->orderInfoText = 'Для оформления нового заказа добавьте товары в корзину';
            $this->orderStatus = 'Заказ не оформлен, нет товаров в корзине';
        }

    }

    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function getOrderInfoText()
    {
        return $this->orderInfoText;
    }

    public function getOrderNum()
    {
        return $this->orderNum = rand(100, 150);
    }

    public function printOrderInfo()
    {
        if(count($this->getProductsList()) !== 0) {
            echo '<h2>Заказ № ' . $this->getOrderNum() . '</h2>';
        }
        echo '<p>Статус заказа: <b>' . $this->getOrderStatus() . '</b></p>';
        echo '<p>' . $this->getOrderInfoText() . '</p>';
        if($this->getOrderStatus() != self::ORDER_CANCEL) {
            $this->orderProductList->printProductsList();
        }
    }
}