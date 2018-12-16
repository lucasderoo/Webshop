<p>Dear {{ $orderDetails['info']['firstname'] }} {{ $orderDetails['info']['lastname'] }}</p>

<p>Here is your order confirmation email</p>

<strong>Order details:</strong>
<p>Status: {{ $order->status }}</p>
<p>Payment method: {{ $order->payment_method }}</p>
<p>Amount: €{{ $orderDetails['info']['price'] }}</p>


<strong>Delivery address:</strong>
<p>{{ $orderDetails['delivery_address']['street'] }} {{ $orderDetails['delivery_address']['house_number'] }}{{ $orderDetails['delivery_address']['suffix'] }}</p>
<p>{{ $orderDetails['delivery_address']['zipcode'] }} {{ $orderDetails['delivery_address']['city'] }}</p>
<p>{{ $orderDetails['delivery_address']['country'] }}</p>


<strong>Billing address:</strong>
<p>{{ $orderDetails['billing_address']['street'] }} {{ $orderDetails['billing_address']['house_number'] }}{{ $orderDetails['billing_address']['suffix'] }}</p>
<p>{{ $orderDetails['billing_address']['zipcode'] }} {{ $orderDetails['billing_address']['city'] }}</p>
<p>{{ $orderDetails['billing_address']['country'] }}</p>


<strong>Ordered products</strong>
@foreach($basketDetails as $key => $product)
<p>{{ $loop->index+1 }}. {{ $guest ? $product['title'] : $product->product->title }} - €{{ $guest ? $product['price'] : $product->product->price }}({{ $guest ? $product['quantity'] : $product->quantity }})</p>
@endforeach