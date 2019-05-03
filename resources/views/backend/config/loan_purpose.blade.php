@extends('layouts.backend')
@section('title', 'Loan purpose')
@section('content')
    <loan-purpose-page></loan-purpose-page>
@endsection

@section('route')
    <script>
        try {
            window.route = "{{ route('backend.api.loan.purpose.index')  }}"
        } catch (e) {
            console.warning('Something happened to set route')
        }
    </script>
@endsection