@extends('user.master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Amount</th>
                        <td>$ {{ $total }}</td>
                    </tr>
                    <tr>
                        <th>Tax</th>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <th>Delivery</th>
                        <td> $ 10</td>
                    </tr>
                    <tr>
                        <th>Total Amount</td>
                        <td>$ {{ $total + 10 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="/orderplace" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="address" placeholder="Enter your address" class="form-control"></textarea>
            </div>
            <input type="hidden" name="amount" value="{{ $total + 10 }}">
            <div class="form-group">
                <label for="pwd">Payment Method</label>
                <input type="radio" value="online" class="radio" name="payment"><span>Online Payment</span>
                <input type="radio" value="emi" class="radio" name="payment"><span>EMI Payment</span>
                <input type="radio" value="ondelivery" class="radio" name="payment"><span>Payment On Delivery</span>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection
