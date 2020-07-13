@extends('layouts.app')

@section('content')

    @if(empty($models->items()))

        <div class="content">
            <div class="empty">
                Моделей нет
            </div>
        </div>


    @else
        <div class="content search">
            <form action="{{ route('modelssearch') }}" method="get">
                <input name="s" placeholder="Искать здесь..." type="search">
                <button type="submit"><i class="fas fa-search my-search"></i></button>
            </form>
        </div>
        <div class="content">


            <table class="table">
                <thead class="dark">
                <tr>
                    <td>Название</td>
                    <td>Производитель</td>
                    <td><i class="fas fa-align-justify my-fas"></i></td>
                </tr>
                </thead>
                <tbody>
                @foreach($models->items() as $model)
                    <tr>
                        <td>{{ $model['title'] }}</td>
                        <td>{{ $model->getManufacturer['title'] }}</td>
                        <td>
                            <a href="{{ route('modelsredact', $model['id']) }}"><i class="fas fa-code my-fas"></i></a>
                            <a href="{{ route('modelsdel', $model['id']) }}"><i class="fas fa-archive my-fas"></i></a>
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
