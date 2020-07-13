@extends('layouts.app')

@section('content')
    @if(empty($sellers->items()))
        <div class="content">
            <div class="empty">
                Продавцов нет
            </div>
        </div>


    @else
        <div class="content search">
            <form action="{{ route('sellersearch') }}" method="get">
                <input name="s" placeholder="Искать здесь..." type="search">
                <button type="submit"><i class="fas fa-search my-search"></i></button>
            </form>
        </div>
<div class="content">


    <table class="table">
        <thead class="dark">
        <tr>
            <td>ФИО</td>
            <td>Адрес</td>
            <td>Телефон</td>
            <td>Сайт</td>
            <td><i class="fas fa-align-justify my-fas"></i></td>
        </tr>
        </thead>
        <tbody>
            @foreach($sellers->items() as $seller)
                <tr>
                    <td>{{ $seller['title'] }}</td>
                    <td>{{ $seller['address'] }}</td>
                    <td>{{ $seller['phone'] }}</td>
                    <td>{{ $seller['website'] }}</td>
                    <td>
                        <a href="{{ route('redactseller', $seller['id']) }}"><i class="fas fa-code my-fas"></i></a>
                        <a href="{{ route('deleteseller', $seller['id']) }}"><i class="fas fa-archive my-fas"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<div class="content">
    <div class="row text-left">
        <a  class="btn-link" href="{{ route('sellercreate') }}">Добавить продавца</a>
    </div>

</div>

@endsection
