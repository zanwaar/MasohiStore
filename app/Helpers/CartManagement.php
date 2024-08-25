<?php

namespace App\Helpers;

use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    // add items to cart
    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images', 'merchant_id']);
            $cart_items[] = [
                'merchant_id' => $product->merchant_id,
                'merchant_nama' => $product->merchant->merchant_nama,
                'slug' => $product->merchant->slug,
                'product_id' => $product_id,
                'name' => $product->name,
                'image' => $product->images,
                'quantity' => 1,
                'unit_amount' => $product->price,
                'total_amount' => $product->price,
                'products' => [
                    'product_id' => $product_id,
                    'name' => $product->name,
                    'image' => $product->images,
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                ],
            ];
        }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // add items to cart with qyt
    static public function addItemToCartWithQty($product_id, $qty = 1)
    {
        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::with('merchant')->where('id', $product_id)->first(['id', 'name', 'price', 'images', 'merchant_id']);
            $cart_items[] = [
                'merchant_id' => $product->merchant_id,
                'merchant_nama' => $product->merchant->merchant_nama,
                'slug' => $product->merchant->slug,
                'product_id' => $product_id,
                'name' => $product->name,
                'image' => $product->images,
                'quantity' => 1,
                'unit_amount' => $product->price,
                'total_amount' => $product->price,
            ];
        }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // remove item from cart
    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }
        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    // add cart items to 
    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    // clear cart items from cookie

    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    // get all cart items from cookie
    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }

    // increment item quantity
    static public function incrementQuantityCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    // decrement item quantity
    static public function decrementQuantityCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }
        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    // caluclate grand total
    static public function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }

    static public function clearCartItemsByMerchantId($cart, $merchant_id)
    {
        // Filter item yang tidak sesuai dengan merchant_id yang diberikan
        $filteredCart = array_filter($cart, function ($item) use ($merchant_id) {
            return $item['merchant_id'] != $merchant_id;
        });

        // Menyimpan ulang data keranjang yang sudah difilter (misalnya menggunakan Cookie)
        Cookie::queue('cart_items', json_encode($filteredCart), 60);

        return $filteredCart;
    }

    static public function groupCartByMerchantAndCaluclateTotal($cart, $merchant_id = null)
    {
        $groupedCart = [];
        foreach ($cart as $item) {
            // Filter berdasarkan merchant_id jika diberikan
            if ($merchant_id !== null && $item['merchant_id'] != $merchant_id) {
                continue;
            }

            $currentMerchantId = $item['merchant_id'];
            if (!isset($groupedCart[$currentMerchantId])) {
                $groupedCart[$currentMerchantId] = [
                    'total_price' => 0,
                    'items' => [],
                ];
            }

            $groupedCart[$currentMerchantId]['merchant_id'] = $item['merchant_id'];
            $groupedCart[$currentMerchantId]['merchant_nama'] = $item['merchant_nama'];
            $groupedCart[$currentMerchantId]['slug'] = $item['slug'];
            $groupedCart[$currentMerchantId]['items'][] = $item;
            $groupedCart[$currentMerchantId]['total_price'] += $item['total_amount'];
        }

        return $groupedCart;
    }
}
