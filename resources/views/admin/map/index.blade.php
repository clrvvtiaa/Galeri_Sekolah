@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title text-white">Pengaturan Peta</h3>
                </div>
                <div class="card-body table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <form action="{{ route('map.update', $map->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <tr>
                                <th width="200">Judul Lokasi</th>
                                <td>
                                    <input type="text" 
                                           name="title" 
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', $map->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <th>URL Embed Google Maps</th>
                                <td>
                                    <textarea name="embed_url" 
                                              rows="3" 
                                              class="form-control @error('embed_url') is-invalid @enderror"
                                              required>{{ old('embed_url', $map->embed_url) }}</textarea>
                                    <small class="text-muted">Masukkan URL dari iframe Google Maps</small>
                                    @error('embed_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <th>Link Google Maps</th>
                                <td>
                                    <input type="url" 
                                           name="google_maps_link" 
                                           class="form-control @error('google_maps_link') is-invalid @enderror"
                                           value="{{ old('google_maps_link', $map->google_maps_link) }}"
                                           required>
                                    <small class="text-muted">Link untuk tombol "Buka di Google Maps"</small>
                                    @error('google_maps_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </td>
                            </tr>
                        </form>
                    </table>

                    @if($map->embed_url)
                        <div class="mt-4">
                            <h5>Preview Peta:</h5>
                            <div class="map-container shadow-sm rounded">
                                <iframe src="{{ $map->embed_url }}"
                                        width="100%" 
                                        height="450" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
