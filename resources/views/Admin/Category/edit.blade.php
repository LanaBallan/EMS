@extends('Admin.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">تعديل تصنيف</h1>

        <form action="/admin/category/edit/{{$category->id}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">:الاسم</label>
                <input style="text-align: right" type="text"
                       class="form-control" id="name"
                       placeholder="أدخل الاسم"
                       value="{{$category->name}}" name="name" required>
            </div>

            <button style="text-align: right" type="submit" class="btn btn-primary">تعديل</button>
        </form>
    </div>






@endsection
