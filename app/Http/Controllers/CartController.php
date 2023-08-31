<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    // Display the shopping cart
    public function index()
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        return view('carts.index', compact('cart'));
    }

    // Add a product to the cart
    public function addToCart(Request $request, $productId)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->quantity = 1;
            $cart->product_id = $productId;

            $cart->save();
        }

        $product = Product::findOrFail($productId);

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = 1;
        $cartItem->price = $product->price;
        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to the shopping cart.');
    }

    // Remove a product from the cart
    public function removeFromCart(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from the shopping cart.');
    }

    // Process the order
    public function checkout(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'payment_method' => 'required|in:credit_card,paypal', // Validate the payment method
        ]);

        // 1. Create an order
        $order = new Order();
        $order->user_id = $user->id;
        // You can add more information to the order as needed
        $order->save();

        // 2. Add items from the cart to the order
        $cart = Cart::where('user_id', $user->id)->first();
        if ($cart) {
            $cartItems = $cart->cartItems;
            foreach ($cartItems as $cartItem) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $cartItem->product_id;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->price = $cartItem->price;
                $orderItem->save();
            }
        }

        // 3. Payment processing (this is where you would integrate with a payment provider)

        // 4. Complete the purchase
        $order->status = 'completed'; // Update the order status as needed
        $order->payment_method = $request->input('payment_method'); // Set the payment method
        $order->save();

        // Remove the cart items after the purchase
        if ($cart) {
            $cart->cartItems()->delete();
        }

        return redirect()->route('confirmation.page')->with('success', 'Order completed successfully.');
    }
}
