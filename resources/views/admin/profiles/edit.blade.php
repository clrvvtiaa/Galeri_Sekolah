@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $profile->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea name="isi" class="form-control" required>{{ old('isi', $profile->isi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection