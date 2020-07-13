@extends('layouts.app')

@section('content')
    @if(empty($manufacturers->items()))
        <div class="content">
            <div class="empty">
                Производителей нет
            </div>
        </div>


    @else
        <div class="content search">
            <form action="{{ route('manufacturerssearch') }}" method="get">
                <input name="s" placeholder="Искать здесь..." type="search">
                <button type="submit"><i class="fas fa-search my-search"></i></button>
            </form>
        </div>
        <div class="content">


            <table class="table">
                <thead class="dark">
                <tr>
                    <td>Название</td>
                    <td>Страна</td>
                    <td>Сайт</td>
                    <td><i class="fas fa-align-justify my-fas"></i></td>
                </tr>
                </thead>
                <tbody>
                @foreach($manufacturers->items() as $manufacturer)
                    <tr>
                        <td>{{ $manufacturer['title'] }}</td>
                        <td>{{ $manufacturer['country'] }}</td>
                        <td>{{ $manufacturer['website'] }}</td>
                        <td>
                            <a href="{{ route('manufacturersredact', $manufacturer['id']) }}"><i class="fas fa-code my-fas"></i></a>
                            <a href="{{ route('manufacturersdel', $manufacturer['id']) }}"><i class="fas fa-archive my-fas"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <div class="content">
            <div class="row text-left">
                <a  class="btn-link" href="{{ route('manufacturerscreate') }}">Добавить производителя</a>
            </div>

        </div>
@endsection
