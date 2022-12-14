@extends('dashboard.layouts._')
@section('content')

<section class="page-section">
    <div class="container">
    <div class="card shadow mb-3 w-100">
            <div class="card-header py-3">
                <p class="text-danger m-0 font-weight-bold">Buy me a caffe</p>
            </div>
            <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <th>Kart</th>
                    <th>Bank</th>
                    <th>Card Type</th>
                </thead>
                <tbody>
                    <tr>
                        <td>5890040000000016</td>
                        <td>Akbank</td>
                        <td>Master Card (Debit)</td>
                    </tr>
                    <tr>
                        <td>9792020000000001</td>
                        <td>Finansbank</td>
                        <td>Troy (Debit)</td>
                    </tr>
                </tbody>
            </table>
            <hr>
                <div id="iyzipay-checkout-form" class="responsive">{!!$a!!}</div>

            </div>
        </div>



    </div>
</section>

@endsection
