@extends('layouts.main')

@section('content')
<div class="container my-5">
    <style>
        /* Styling untuk header */
        h2.mb-4 {
            font-size: 2.4rem;
            font-weight: bold;
            text-align: center;
            color: #34495e;
            position: relative;
            margin-bottom: 2rem;
        }
        h2.mb-4::after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background: #3498db;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* Styling untuk card menjadi kotak persegi */
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0; /* Ubah border-radius menjadi 0 untuk membuatnya kotak */
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 1.5rem;
            background: #f9f9f9;
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: #7f8c8d;
            line-height: 1.6;
            font-size: 1rem;
        }

        .text-muted {
            font-size: 0.85rem;
            color: #95a5a6;
            font-style: italic;
            margin-top: 1rem;
            display: flex;
            align-items: center;
        }

        .text-muted i {
            margin-right: 8px;
        }

    </style>

    <h2 class="mb-4">Agenda</h2>

    @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{!! $post->content !!}</p>
                <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection