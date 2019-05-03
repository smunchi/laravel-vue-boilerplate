@extends('layouts.backend')
@section('title', 'Product')
@section('content')
<product-page></product-page>
@endsection

@section('route')
    <script>
        try {
            window.route = "{{ route('backend.api.product.index')  }}"
        } catch (e) {
            console.warning('Something happened to set route')
        }
    </script>
@endsection