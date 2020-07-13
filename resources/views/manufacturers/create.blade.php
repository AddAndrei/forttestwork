@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('savemanufacturers') }}" method="post">
                @csrf
                <div class="form-row">
                    <label for="title">Название</label>
                    <input type="text" id="fio" class="form-input" name="title" placeholder="название" required>
                </div>
                <div class="form-row">
                    <label for="country">Страна</label>
                    <input type="text" id="country" class="form-input" name="country" placeholder="Страна" required>
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
            <a class="link" href="{{ route('manufacturers') }}">Назад</a>
        </div>
    </div>
@endsection

