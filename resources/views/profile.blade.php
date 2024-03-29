@extends('layouts.dashbord')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h3>Upload Image</h3>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-center p-2">
                    <div>
                        @php
                            $id = 0;
                        @endphp
                        @foreach ($images as $image)
                            @if ($image->id_user == [])
                                @php
                                    $gambar = "images/logo.jpg";
                                    $id = 0;
                                @endphp
                            @else
                                @php
                                    $gambar = $image->image;
                                    $id = $image->id_user;
                                @endphp
                            @endif
                        @endforeach
                        @if ($id == Auth::user()->id)
                                <div>
                                    <img src="{{ asset('storage').'/'. $gambar }}" class="img-fluid rounded-circle">
                                </div>
                            @else
                                <div>
                                    <img src="{{ asset('images/logo.jpg') }}" class="img-fluid rounded-circle">
                                </div>
                        @endif
                    </div>
                </div>
                    <form action="{{ route('store_upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <div class="col-md-5 ms-5 me-5">
                                <div class="form-group mb-1">
                                    <label for="file">Pilih Gambar</label>
                                    <input type="file" id="file" class="form-control-sm" name="image" required>
                                    <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 btn-sm">Upload</button>
                                <a href="{{ route('home') }}" class="btn btn-warning mt-2 btn-sm">Cancel</a>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
