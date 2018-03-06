<?php
namespace Order;
final class Order extends \Basket\Basket
{
    const ORDER_CREATED = 'заказ оформлен';
    const ORDER_DELIVERY = 'заказ передан на доставку';
    const ORDER_DONE = 'заказ выполнен';
    const ORDER_CANCELL = 'заказ отменен';
    protected $orderStatus;
    protected $orderInfoText;
    protected $orderProductList = [];

    public function changeOrderStatus($id_status)
    {
        switch($id_status){
            case 1:
                $this->orderStatus = self::ORDER_CREATED;
                $this->orderInfoText = 'Для того чтобы мы отправили заказа Вам необходимо его оплатить';
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
                $this->orderStatus = self::ORDER_CANCELL;
                $this->orderInfoText = 'Для оформления нового заказа добавьте товары в корзину';
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

    public function printOrderInfo()
    {
        echo '<h2>Заказ № ' . $orderNum = rand(100,150) . '</h2>';
        echo '<p>Статус заказа: <b>' . '</b></p>';
    }
}