@extends('layouts.app', ['activePage' => 'products', 'menuParent' => 'products', 'titlePage' => __('Create Products')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Produk</h3>
                    </div>
                    <form action="{{route('page.products.edit.post')}}" method="post">
                    @csrf
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- ACTION MENGARAH KE /product/id -->
                        <form action="{{ url('/product/' . $product->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title }}" placeholder="Masukkan nama produk">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" cols="10" rows="10" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("js")
@endpush
