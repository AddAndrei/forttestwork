@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('updateseller') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $seller['id'] }}">
                <div class="form-row">
                    <label for="fio">ФИО</label>
                    <input type="text" id="fio"
                           class="form-input" name="fio"
                           value="{{ $seller['title'] }}" placeholder="фио" required>
                </div>
                <div class="form-row">
                    <label for="address">Адрес</label>
                    <input type="text" id="address"
                           class="form-input" name="address"
                           value="{{ $seller['address'] }}" placeholder="адрес" required>
                </div>
                <div class="form-row">
                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone"
                           class="form-input" name="phone"
                           value="{{ $seller['phone'] }}" placeholder="телефон" required>
                </div>
                <div class="form-row">
                    <label for="website">сайт</label>
                    <input type="text" id="website"
                           class="form-input" name="website"
                           value="{{ $seller['website'] }}" placeholder="сайт" required>
                </div>
                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
@endsection
