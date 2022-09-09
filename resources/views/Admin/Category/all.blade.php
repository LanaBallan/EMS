@extends('Admin.app')
@section('content')



    <h1 class="text-center">معلومات جميع التصنيفات</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>الاسم</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $one)
            <tr>

                <td>
                    <a type="button"
                       href="/admin/category/delete/{{$one->id}}"
                       class="btn btn-outline-danger">حذف</a>

                    <a type="button"
                       href="/admin/category/edit/{{$one->id}}"
                       class="btn btn-outline-success">تعديل</a>
                </td>

                <td>{{$one->name}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
