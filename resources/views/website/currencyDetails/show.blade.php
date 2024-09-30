@extends('website.layouts.app')

@section('content')
<div class="container">
    <h2>{{ $token->name }} ({{ $token->symbol }})</h2>
    <p><strong>العنوان:</strong> {{ $token->address }}</p>
    <p><strong>الوصف:</strong> {{ $token->description }}</p>

    <!-- عرض نتائج الفحص إن وجدت -->
    @if(isset($analysis))
        <h3>نتائج الفحص</h3>
        <pre>{{ json_encode($analysis, JSON_PRETTY_PRINT) }}</pre>
    @endif
</div>
@endsection
