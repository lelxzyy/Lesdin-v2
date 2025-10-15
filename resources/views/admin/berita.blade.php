@extends('layouts.admin-layouts')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Semua Berita</h1>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Judul</th>
                <th class="py-2 px-4 border-b">Isi</th>
                <th class="py-2 px-4 border-b">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $item->judul }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->isi }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
