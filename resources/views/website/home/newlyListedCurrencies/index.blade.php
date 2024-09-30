@extends('website.layouts.app')

@section('content')
<div class="container">
    <h2>العملات المدرجة حديثًا</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>اسم العملة</th>
                <th>الرمز</th>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newlyListedCurrencies as $currency)
                <tr>
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>{{ $currency->address }}</td>
                    <td>{{ Str::limit($currency->description, 50) }}</td>
                    <td>
                        <a href="{{ route('website.newlyListedCurrencies.show', $currency->id) }}" class="btn btn-sm btn-info">عرض</a>
                        <!-- يمكن إضافة أزرار أخرى مثل تحرير وحذف إذا لزم الأمر -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
