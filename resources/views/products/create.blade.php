@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('saveproduct') }}" method="post">
                @csrf
                <div class="form-row">
                    <label for="title">Название</label>
                    <input type="text" id="fio" class="form-input" name="title" placeholder="название" required>
                </div>

                <div class="form-row">
                    <button type="submit">Сохранить</button>
                </div>

            </form>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <a class="link" href="{{ route('products') }}">Назад</a>
        </div>
    </div>
@endsection

