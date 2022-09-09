@extends('Admin.app')
@section('content')



<h1 class="text-center">معلومات جميع المنتجات</h1>
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th></th>
        <th>التصنيف</th>
        <th>الوصف</th>
        <th>السعر</th>
        <th>الاسم</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $one)
        <tr>

            <td>
                <a type="button"
                   href="/admin/product/delete/{{$one->id}}"
                   class="btn btn-outline-danger">حذف</a>

                <a type="button"
                   href="/admin/product/edit/{{$one->id}}"
                   class="btn btn-outline-success">تعديل</a>
            </td>


            <td>{{$one->get_category->name}}</td>
            <td>{{$one->description}}</td>

            <td>{{$one->price}}</td>

            <td>{{$one->name}}</td>

            @endforeach
        </tr>
    </tbody>
</table>
@endsection
