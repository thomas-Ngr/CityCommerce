<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . 'CSVFileStorage.php';
require_once $MODELS_DIR . 'ProductModel.php';
require_once $CLASSES_DIR . 'client.php';
require_once $CLASSES_DIR . 'order.php';

class OrderModel {

    public static function getOrder($id) {
        $orders = [];

        $storage = new FileStorage('orders.csv');
        $data = $storage->readAll();

        foreach($data as $row) {
            if ($row[0] === $id) {
                return OrderModel::tableRowToOrder($row);
            }
        }
        return false;
    }

    public static function create($order) {
        $order_table = OrderModel::orderToTable($order);

        $storage = new FileStorage('orders.csv');
        $storage->create($order_table);
    }

    public static function cancel($id) {
        $storage = new FileStorage('orders.csv');
        $data = $storage->readAll();

        foreach($data as $pos => $row) {
            if ($row[0] === $id) {
                $order = OrderModel::tableRowToOrder($row);
                $order->cancel();
                $storage->update($pos, OrderModel::orderToTable($order));
                return true;
            }
        }
        return false;
    }

    public static function pay($id) {
        $storage = new FileStorage('orders.csv');
        $data = $storage->readAll();

        foreach($data as $pos => $row) {
            if ($row[0] === $id) {
                $order = OrderModel::tableRowToOrder($row);
                $order->pay();
                $storage->update($pos, OrderModel::orderToTable($order));
                return true;
            }
        }
        return false;
    }

    private function orderToTable($order) {
        return [
            $order->getId(),
            $order->getTimestamp(),
            $order->getStatus(),
            $order->customer->pseudo,
            $order->customer->name,
            $order->customer->first_name,
            $order->customer->address,
            $order->customer->email,
            $order->customer->phone_number,
            $order->product->getId(),
            $order->product->name,
            $order->product->getPrice(),
        ];
    }

    private function tableRowToOrder($row) {
        $product = ProductModel::getProductById($row[9]);
        $customer = new Customer(
            $pseudo = $row[3],
            $name = $row[4],
            $first_name = $row[5],
            $address = $row[6],
            $email = $row[7],
            $phone = $row[8],
        );
        $order = new Order (
            $customer,
            $product,
            $status = intval($row[2])
        );
        $order->setTimestamp($row[1]);
        $order->setId($row[0]);
        return $order;
    }


}

?>