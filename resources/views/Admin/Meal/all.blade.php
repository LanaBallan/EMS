@extends('Admin.app')
@section('content')



    <h1 class="text-center">معلومات جميع الوجبات</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>المطعم</th>
            <th>المكونات</th>
            <th>السعر</th>
            <th>الاسم</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meals as $one)
            <tr>

                <td>
                    <a type="button"
                       href="/admin/meal/delete/{{$one->id}}"
                       class="btn btn-outline-danger">حذف</a>

                    <a type="button"
                       href="/admin/meal/edit/{{$one->id}}"
                       class="btn btn-outline-success">تعديل</a>
                </td>



                <td>{{$one->get_restaurant->name}}</td>
                <td>{{$one->ingredients}}</td>

                <td>{{$one->price}}</td>

                <td>{{$one->name}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
