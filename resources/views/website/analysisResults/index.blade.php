@extends('website.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>نتائج التحليل</h2>
    @if(isset($analysis['error']))
        <div class="alert alert-danger">
            {{ $analysis['error'] }}
        </div>
    @elseif($analysis)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تفاصيل العملة</h5>
                <p class="card-text"><strong>اسم العملة:</strong> {{ $analysis['name'] }}</p>
                <p class="card-text"><strong>الرمز:</strong> {{ $analysis['symbol'] }}</p>
                <p class="card-text"><strong>العنوان:</strong> {{ $analysis['address'] }}</p>
                <p class="card-text"><strong>التحليل:</strong></p>
                <pre>{{ json_encode($analysis['analysis'], JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>
    @else
        <p>لم يتم العثور على نتائج.</p>
    @endif
</div>
@endsection
