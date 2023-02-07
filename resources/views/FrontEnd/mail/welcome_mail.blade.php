<div class="card">
    <div class="card-body">
        <table class="table-borderless">
            <tr>
                <td>Dear <strong>{{ $name }}</strong></td>
            </tr>
            <tr>
                <td>Your Order Id: <strong>{{ $order_id }}</strong></td>
            </tr>
            <tr>
                <td>Order Total Amount: <strong>{{ $total ?? '' }}tk</strong></td>
            </tr>
            <tr>
                <td>Your Phone Number: <strong>{{ $number ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Your Shipping Address: <strong>{{ $address ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Thanks for your order </td>
            </tr>
            <tr>
                <td>Stay Connected us</td>
            </tr>
            <tr><td>Visit this link to shop more:<a href="{{ url('/') }}">Click to more</a></td></tr>
            <tr>
                <td>Regards,</td>
            </tr>
            <tr>
                <td>O F C S M S Team</td>
            </tr>
        </table>

    </div>
</div>

