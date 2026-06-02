@extends('layouts.app')

@section('content')
    <x-sections.hero />
    <x-sections.banner />

    <div class="py-16 md:py-18" id="menu-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-sections.restaurant-menu :restaurantMenu="$restaurantMenu" />
            <x-sections.catering-menu :cateringMenu="$cateringMenu" />
            <x-sections.frozen-menu :frozenMenu="$frozenMenu" />
        </div>
    </div>

    <x-sections.team :teamMembers="$teamMembers" />
    <x-sections.frozen-modal />
@endsection
