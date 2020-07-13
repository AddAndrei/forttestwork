@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="form">
            <form action="{{ route('savepricelist') }}" method="post">
                @csrf
                <div class="form-row">
                    <label for="price">Цена</label>
                    <input type="text" id="price" class="form-input" name="price" required>
                </div>
                <div class="form-row">
                    <label for="product">Продукт</label>
                    <select id="product" class="form-input" name="product">
                        @foreach($products as $product)
                            <option value="{{ $product['id'] }}">{{ $product['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="seller">Продавец</label>
                    <select id="seller" class="form-input" name="seller">
                        @foreach($sellers as $seller)
                            <option value="{{ $seller['id'] }}">{{ $seller['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="manufacturer">Производители</label>
                    <select id="manufacturer" onchange="loadModels()" class="form-input" name="manufacturer">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer['id'] }}">{{ $manufacturer['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="model">Модель</label>
                    <select id="model" class="form-input" name="model">

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
            <a class="link" href="{{ route('pricelist') }}">Назад</a>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection

