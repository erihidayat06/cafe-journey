@extends('cafe.layouts.main')

@section('container')
    @include('cafe.card.event')
    @include('cafe.card.deskripsi')
    @include('cafe.card.alamat')
    @include('cafe.card.foto')
    @include('cafe.card.jadwal')
    @include('cafe.card.rating')
    @include('cafe.card.kontak')
@endsection
