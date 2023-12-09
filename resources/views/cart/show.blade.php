<!-- resources/views/cart/show.blade.php -->

    <h1>Shopping Cart</h1>

    @if (count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $productId => $item)
                    <tr>
                    <td>{{ $item['image'] }}</td>
                        <td>{{ $item['nomproduit'] }}</td>
                        <td>{{ $item['prix'] }}</td>
                        <td>{{ $item['quantite'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif

