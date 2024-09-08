<?php

namespace Didikala\Model;

class Cart
{

    public static function add($product)
    {
        //check session['cart'] exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        //add process
        //check the product exist in cart
        if (isset($_SESSION['cart'][$product->ID])) {
            $_SESSION['cart'][$product->ID]['quantity']++;
        } else {
            $_SESSION['cart'][$product->ID] = [
                'ID' => $product->ID,
                'price' => static::get_total_item_price($product),
                'sale_price' => static::get_total_item_sale_price($product),
                'quantity' => 1,
            ];
        }
    }

    public static function has_product_in_cart($product_id)
    {
        if (!isset($_SESSION['cart'])) {
            return false;
        } else {
            foreach ($_SESSION['cart'] as $cart) {
                if ($cart['ID'] == $product_id) {
                    return true;
                }
            }
        }
    }

    public static function get_total_item_price($product)
    {
        return $product->price * $_SESSION['cart'][$product->ID]['quantity'];
    }

    public static function get_total_item_sale_price($product)
    {
        return $product->get_price() * $_SESSION['cart'][$product->ID]['quantity'];
    }

    public static function get_total_price()
    {
        $total_price = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $total_price += $cart['price'];
            }
        }
        return $total_price;
    }

    public static function get_total_sale_price()
    {
        $total_price = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $total_price += $cart['sale_price'];
            }
        }
        return $total_price;
    }

    public static function get_total_discount_percent()
    {
        return round((self::get_total_price() - self::get_total_sale_price()) / self::get_total_price() * 100) . '%';
    }

    public static function remove($product)
    {
        //check session['cart'] exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        //add process
        //check the product exist in cart
        if ($_SESSION['cart'][$product->ID]['quantity'] > 1) {
            $_SESSION['cart'][$product->ID]['quantity']--;
        } else {
            unset($_SESSION['cart'][$product->ID]);
        }
    }

    public static function has_cart()
    {
        if (!isset($_SESSION['cart'])) {
            return false;
        } elseif ($_SESSION['cart'] == []) {
            return false;
        } else {
            return true;
        }
    }

    public static function clear()
    {
        unset($_SESSION['cart']);
    }
}