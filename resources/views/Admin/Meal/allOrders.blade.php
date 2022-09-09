@extends('Admin.app')
@section('content')



    <h1 class="text-center">معلومات طلبات المنتجات</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>ملاحظات الزبون</th>
            <th>السعر الكامل</th>
            <th>تكلفة التوصيل</th>
            <th>موقع التوصيل</th>
            <th>سعر الوجبة</th>
            <th>الكمية</th>
            <th>اسم الوجبة</th>
            <th>رقم الزبون</th>
            <th>اسم الزبون</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $one)
            <tr>

                <td>
                    <a type="button"
                       href="/admin/mealorder/delete/{{$one->orderId}}"
                       class="btn btn-outline-danger">حذف</a>
                </td>
                <td>{{$one->note}}</td>
                <td>{{$one->total_price}}</td>
                <td>{{$one->cost}}</td>
                <td>{{$one->locationName}}</td>
                <td>{{$one->mealPrice}}</td>
                <td>{{$one->quantity}}</td>

                <td>{{$one->mealName}}</td>
                <td>{{$one->phone}}</td>
                <td>{{$one->f_name}} {{$one->l_name}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
