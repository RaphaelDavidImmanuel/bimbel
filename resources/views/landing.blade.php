@extends('layouts.app')

@section('content')
    {{-- Navigation --}}
    <x-landing.navbar />

    {{-- Hero Section --}}
    <x-landing.hero />

    {{-- Programs Section --}}
    <x-landing.programs />

    {{-- Levels/Jenjang Section --}}
    <x-landing.levels />

    {{-- Subjects/Mapel Section --}}
    <x-landing.subjects />

    {{-- Features/Keunggulan Section --}}
    <x-landing.features />

    {{-- Cara Kerja Section --}}
    <x-sections.how-it-works />

    {{-- Testimonial Section --}}
    <x-landing.testimonial />

    {{-- FAQ Section --}}
    <x-landing.faq />

    {{-- CTA Section --}}
    <x-landing.cta />

    {{-- Footer Section --}}
    <x-landing.footer />
@endsection
