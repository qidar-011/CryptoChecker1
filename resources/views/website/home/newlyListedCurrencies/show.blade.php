@extends('website.layouts.app')

@section('content')
<div class="container">
    <h2>{{ $currency->name }} ({{ $currency->symbol }})</h2>
    <p><strong>العنوان:</strong> {{ $currency->address }}</p>
    <p><strong>الوصف:</strong> {{ $currency->description }}</p>

    <!-- يمكنك إضافة المزيد من التفاصيل أو التحليلات هنا -->
</div>
@endsection
