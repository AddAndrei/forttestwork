@extends('layouts.app')

@section('content')
<div class="content">
    <div class="form">
        <form action="{{ route('saveseller') }}" method="post">
            @csrf
            <div class="form-row">
                <label for="fio">ФИО</label>
                <input type="text" id="fio" class="form-input" name="fio" placeholder="фио" required>
            </div>
            <div class="form-row">
                <label for="address">Адрес</label>
                <input type="text" id="address" class="form-input" name="address" placeholder="адрес" required>
            </div>
            <div class="form-row">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" class="form-input" name="phone" placeholder="телефон" required>
            </div>
            <div class="form-row">
                <label for="website">сайт</label>
                <input type="text" id="website" class="form-input" name="website" placeholder="сайт" required>
            </div>
            <div class="form-row">
                <button type="submit">Сохранить</button>
            </div>

        </form>
    </div>
</div>
    <div class="content">
        <div class="row">
            <a class="link" href="{{ route('sellers') }}">Назад</a>
        </div>
    </div>
@endsection
