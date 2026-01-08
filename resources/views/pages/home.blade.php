@extends('layouts.public')

@section('title', 'الرئيسية - Software Squad')

@section('content')
    <x-hero />
    <x-features-grid />
    <x-portfolio-grid :projects="$latestProjects" />
    <x-cta />
@endsection

@push('styles')
<style>
    @media (prefers-reduced-motion: no-preference) {
        .reveal-on-scroll { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s ease; }
        .reveal-on-scroll.is-visible { opacity: 1; transform: none; }
    }
</style>
@endpush
