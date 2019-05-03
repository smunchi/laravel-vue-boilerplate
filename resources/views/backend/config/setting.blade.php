@extends('layouts.backend')
@section('title', 'Setting')
@section('content')
    <setting-page></setting-page>
@endsection

@section('route')
    <script>
        try {
            window.route = "{{ route('backend.api.setting.index')  }}"
        } catch (e) {
            console.warning('Something happened to set route')
        }
    </script>
@endsection