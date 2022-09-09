@extends('Admin.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">تعديل موقع</h1>

        <form action="/admin/location/edit/{{$location->id}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">:الاسم</label>
                <input style="text-align: right" type="text" class="form-control"
                       value="{{$location->name}}" id="name" placeholder="أدخل اسم الموقع" name="name" required>
            </div>
            <div class="form-group">
                <label for="cost">:التكلفة</label>
                <input style="text-align: right" type="number" class="form-control"
                       value="{{$location->cost}}" id="cost" placeholder="أدخل تكلفة التوصيل" name="cost" required>
            </div>


            <button style="text-align: right" type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>






@endsection
