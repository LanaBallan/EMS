@extends('Admin.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">تعديل وجبة</h1>

        <form action="/admin/meal/edit/{{$meal->id}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">:الاسم</label>
                <input style="text-align: right" type="text" class="form-control"
                       value="{{$meal->name}}" id="name" placeholder="أدخل الاسم" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">:السعر</label>
                <input style="text-align: right" type="number" class="form-control"
                       value="{{$meal->price}}" id="price" placeholder="أدخل سعر المنتج" name="price" required>
            </div>
            <div class="form-group">
                <label for="ingredients">:المكونات</label>
                <input style="text-align: right" type="text" class="form-control"
                       value="{{$meal->ingredients}}" id="ingredients" placeholder="أدخل مكونات الوجبة" name="ingredients" required>
            </div>

            <div class="form-group">
                <label for="restaurant_id">:المطعم</label>
                <select style="text-align: right" class="form-control" name="restaurant_id" id="restaurant_id">
                    @foreach($restaurants as $one)
                        <option value="{{$one->id}}">{{$one->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">:صورة الوجبة</label>
                <input style="text-align: right" id="image" type="file" class="form-control form-control-user "
                       name="image"  required
                       accept="image/*,.pdf">
            </div>

            <button style="text-align: right" type="submit" class="btn btn-primary">تعديل</button>
        </form>
    </div>






@endsection
