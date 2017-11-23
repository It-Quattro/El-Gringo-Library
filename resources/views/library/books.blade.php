<!-- Stored in resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('title', 'Books Page')

@section('menu')
    @extends('layouts.menu')
@endsection


@if (Auth::check())
    @section('content')
        <div class="panel-body addBook">
            <form action="{{ route('book') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group" style="margin: auto; width: 50%;">
                    <h2 class="col-sm-3 control-label">Create a book </h2>
                            <input type="text" name="name" id="name" placeholder="Name of the book" class="form-control">
                            <input type="text" name="author" id="author" placeholder="Author of the book" class="form-control">
                            <input type="text" name="description" id="description" placeholder="Description of the book" class="form-control">
                            <input type="text" name="available" id="available" placeholder="Available ? " class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add books
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        @if (count($booksBDD) > 0)
        <div class="panel-body updateBook">
            <form action="" method="POST" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group" style="width: 50%; margin: auto;">
                    <h2  class="col-sm-3 control-label">Update a book </h2>
                        <input type="text" name="name" id="name" placeholder="Name of the book" class="form-control">
                        <input type="text" name="author" id="author" placeholder="Author of the book" class="form-control">
                        <input type="text" name="description" id="description" placeholder="Description of the book" class="form-control">
                        <input type="text" name="available" id="available" placeholder="Available ? " class="form-control">
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Update books
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel panel-default" style="text-align: center; width: 50%; margin: auto;">
            <div class="panel-heading" style="text-align: center;">
            Here's all the current books
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover table-bordered" style="text-align: center; width: 50%; margin: auto;">
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($booksBDD as $book)
                            <tr class="table-active" id="{{$book->id}}">
                                <td class="name" >
                                    <span> {{$book->name}} </span>
                                </td>
                                <td class="author">
                                    <span> {{$book->author}} </span>
                                </td>
                                <td class="description">
                                    <span> {{$book->description}} </span>
                                </td>
                                <td class="available">
                                    @if ($book->available == 1)
                                        <i class="fa fa-thumbs-up" id="true" style="color: green" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-thumbs-down"  id="false" style="color: red" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    <button type="submit" class="btn update">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        <script>
        $('.updateBook').hide()
        $('.update').on('click', function(){
            var $this = $(this);
            var id = $this.parents('tr').attr('id');
            var name = $(' #'+ id + ' .name span').text()
            var author = $(' #'+ id + ' .author span').text()
            var description = $(' #'+ id + ' .description span').text()
            var available = $(' #'+ id + ' .available i').attr('id')
            $('.updateBook').show()
            $('.updateBook #name').val(name)
            $('.updateBook #author').val(author)
            $('.updateBook #description').val(description)
            $('.updateBook #available').val(available)
            $('.updateBook form').attr('action', '/book/' + id)
            $('.addBook').hide()
        })
        </script>
    @endsection
@else
    @section('content')
        fuck
    @endsection
@endif