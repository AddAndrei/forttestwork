@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('updateproduct') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <div class="form-row">
                    <label for="fio">Название</label>
                    <input type="text" id="fio"
                           class="form-input" name="fio"
                           value="{{ $product['title'] }}" placeholder="Название" required>
                </div>

                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
@endsection

