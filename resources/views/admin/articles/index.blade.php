@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

@component('admin.components.breadcrumb')
    @slot('title') Список новостей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Новости @endslot
@endcomponent

<hr>

<a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-0"></i>Создать новость</a>
    <table class="table table-striped">
        <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
        </thead>
        <tbody>
        @forelse ($articles as $article)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->published}}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')){ return true }else { return false }" 
                    action="{{route('admin.article.destroy', $article)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">

                {{ csrf_field() }}

                <a class="btn btn-default" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>

                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                
                </form>
                    
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-centre"><h2>Данные отсутствуют</h2></td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <td colspan="3">
                <ul class="pagination pull-right">
                    {{$categories->links()}}
                </ul>
            </td>

        </tfoot>
    </table>
</div>




@endsection