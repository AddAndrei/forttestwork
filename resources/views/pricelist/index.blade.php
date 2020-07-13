@extends('layouts.app')

@section('content')
    @if(empty($pricelist->items()))

        <div class="content">
            <div class="empty">
                Моделей нет
            </div>
        </div>


    @else

        <div class="content">


            <table class="table">
                <thead class="dark">
                <tr>
                    <td>Цена</td>
                    <td>Производитель</td>
                    <td>Продавец</td>
                    <td>Продукт</td>
                    <td>Модель</td>
                    <td><i class="fas fa-align-justify my-fas"></i></td>
                </tr>
                </thead>
                <tbody>
                @foreach($pricelist->items() as $model)
                    <tr>
                        <td>{{ $model['price'] }} p.</td>
                        <td>{{ $model->getManufacturer['title'] }}</td>
                        <td>{{ $model->getSeller['title'] }}</td>
                        <td>{{ $model->getProduct['title'] }}</td>
                        <td>{{ $model->getModel['title'] }}</td>
                        <td>
                            <a href="{{ route('pricelistredact', $model['id']) }}"><i class="fas fa-code my-fas"></i></a>
                            <a href="{{ route('pricelistsdel', $model['id']) }}"><i class="fas fa-archive my-fas"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <div class="content">
            <div class="row text-left">
                <a  class="btn-link" href="{{ route('modelscreate') }}">Добавить модель</a>
            </div>

        </div>
@endsection
