@extends('layouts.app')

@section('content')
    @if(empty($products->items()))
        <div class="content">
            <div class="empty">
                Продуктов нет
            </div>
        </div>


    @else
        <div class="content search">
            <form action="{{ route('productsearch') }}" method="get">
                <input name="s" placeholder="Искать здесь..." type="search">
                <button type="submit"><i class="fas fa-search my-search"></i></button>
            </form>
        </div>
        <div class="content">


            <table class="table">
                <thead class="dark">
                <tr>
                    <td>Название</td>
                    <td><i class="fas fa-align-justify my-fas"></i></td>
                </tr>
                </thead>
                <tbody>
                @foreach($products->items() as $product)
                    <tr>
                        <td>{{ $product['title'] }}</td>
                        <td>
                            <a href="{{ route('redactproduct', $product['id']) }}"><i class="fas fa-code my-fas"></i></a>
                            <a href="{{ route('deleteproduct', $product['id']) }}"><i class="fas fa-archive my-fas"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <div class="content">
            <div class="row text-left">
                <a  class="btn-link" href="{{ route('productcreate') }}">Добавить продукт</a>
            </div>

        </div>
@endsection
