@extends('Admin.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">تعديل منتج</h1>

        <form action="/admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="name">:الاسم</label>
                <input style="text-align: right" type="text" class="form-control"
                       value="{{$product->name}}" id="name" placeholder="أدخل الاسم" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">:السعر</label>
                <input style="text-align: right" type="number" class="form-control"
                       value="{{$product->price}}" id="price" placeholder="أدخل سعر المنتج" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">:الوصف</label>
                <input style="text-align: right" type="text" class="form-control"
                       value="{{$product->description}}"  id="description" placeholder="أدخل وصف للمنتج" name="description" required>
            </div>

            <div class="form-group">
                <label for="category_id">:التصنيف</label>
                <select style="text-align: right" class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $one)
                        <option value="{{$one->id}}">{{$one->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">:صورة المنتج</label>
                <input style="text-align: right" id="image" type="file" class="form-control form-control-user "
                       name="image"  required
                       accept="image/*,.pdf">
            </div>
            <button type="submit" class="btn btn-primary">تعديل</button>
        </form>
    </div>




    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
