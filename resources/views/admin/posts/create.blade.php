@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="/posts" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-group mb-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->title }}</option>
@endforeach

                    </select>
                </div>
                    </div>
                    
                    <div class="col">
                    <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="content">Isi</label>
                    <textarea name="content" id="content" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>

@endsection
