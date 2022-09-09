@extends('Admin.app')
@section('content')



    <h1 class="text-center">معلومات الحجوزات</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>التاريخ</th>
            <th>عدد الأشخاص</th>
            <th>اسم المطعم</th>
            <th>رقم الزبون</th>
            <th>اسم الزبون</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $one)
            <tr>

                <td>
                    <a type="button"
                       href="/admin/reservation/delete/{{$one->reservationId}}"
                       class="btn btn-outline-danger">حذف</a>
                </td>

                <td>{{$one->date}}</td>
                <td>{{$one->number_of_people}}</td>
                <td>{{$one->restaurantName}}</td>
                <td>{{$one->phone}}</td>
                <td>{{$one->f_name}} {{$one->l_name}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
