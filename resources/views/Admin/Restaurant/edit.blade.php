@extends('Admin.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">تعديل مطعم</h1>

        <form action="/admin/restaurant/edit/{{$restaurant->id}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">:الاسم</label>
                <input style="text-align: right" type="text" class="form-control"
                       id="name" placeholder="أدخل الاسم"
                       value="{{$restaurant->name}}" name="name" required>
            </div>

            <div class="form-group">
                <label for="number">:الرقم</label>
                <input style="text-align: right" type="number"
                       class="form-control" id="number" value="{{$restaurant->number}}"
                       placeholder="أدخل رقم المطعم" name="number" required>
            </div>
            <div class="form-group">
                <label for="location">:الموقع</label>
                <input style="text-align: right" type="text" class="form-control" id="location" value="{{$restaurant->location}}"
                       placeholder="أدخل موقع المطعم" name="location" required>
            </div>
            <div class="form-group">
                <label for="email">:البريد الالكتروني</label>
                <input style="text-align: right" type="text" class="form-control" id="email" value="{{$restaurant->email}}"
                       placeholder="أدخل البريد الالكتروني" name="email" required>
            </div>
            <div class="form-group">
                <label for="image">:صورة المطعم</label>
                <input style="text-align: right" id="image" type="file" class="form-control form-control-user "
                       name="image"  required
                       accept="image/*,.pdf">
            </div>

            <button style="text-align: right" type="submit" class="btn btn-primary">تعديل</button>
        </form>
    </div>






@endsection
