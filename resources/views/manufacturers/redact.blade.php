@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('updatemanufacturers') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $manufacturer['id'] }}">
                <div class="form-row">
                    <label for="title">Название</label>
                    <input type="text" id="title"
                           class="form-input" name="title"
                           value="{{ $manufacturer['title'] }}" placeholder="Название" required>
                </div>
                <div class="form-row">
                    <label for="country">Страна</label>
                    <input type="text" id="country"
                           class="form-input" name="country"
                           value="{{ $manufacturer['country'] }}" placeholder="Название" required>
                </div>
                <div class="form-row">
                    <label for="website">Сайт</label>
                    <input type="text" id="website"
                           class="form-input" name="website"
                           value="{{ $manufacturer['website'] }}" placeholder="Название" required>
                </div>
                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
@endsection

