@extends('Admin.app')
@section('content')



    <h1 class="text-center">معلومات جميع المطاعم</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>البريد الالكتروني</th>
            <th>الموقع</th>
            <th>الرقم</th>
            <th>الاسم</th>
        </tr>
        </thead>
        <tbody>
        @foreach($restaurants as $one)
            <tr>

                <td>
                    <a type="button"
                       href="/admin/restaurant/delete/{{$one->id}}"
                       class="btn btn-outline-danger">حذف</a>

                    <a type="button"
                       href="/admin/restaurant/edit/{{$one->id}}"
                       class="btn btn-outline-success">تعديل</a>
                </td>


                <td>{{$one->email}}</td>
                <td>{{$one->location}}</td>

                <td>{{$one->number}}</td>

                <td>{{$one->name}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
