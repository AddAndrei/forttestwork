@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('savemodels') }}" method="post">
                @csrf
                <div class="form-row">
                    <label for="title">Название</label>
                    <input type="text" id="fio" class="form-input" name="title" placeholder="название" required>
                </div>
                <div class="form-row">
                    <label for="manufacturer">Производитель</label>
                    <select id="manufacturer" class="form-input" name="manufacturer">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer['id'] }}">{{ $manufacturer['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <a class="link" href="{{ route('models') }}">Назад</a>
        </div>
    </div>
@endsection
