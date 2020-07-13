@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('updatemodels') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $model['id'] }}">
                <div class="form-row">
                    <label for="title">Название</label>
                    <input type="text" id="title"
                           class="form-input" name="title"
                           value="{{ $model['title'] }}" placeholder="Название" required>
                </div>
                <div class="form-row">
                    <label for="manufacturers">Производитель</label>
                    <select name="manufacturer" id="manufacturers" class="form-input">
                        @foreach($manufacturers as $manufacturer)
                            @if($manufacturer['id'] === $model['manufacturer_id'])
                                <option value="{{ $manufacturer['id'] }}" selected>{{ $manufacturer['title'] }}</option>
                            @else
                                <option value="{{ $manufacturer['id'] }}">{{ $manufacturer['title'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
@endsection

