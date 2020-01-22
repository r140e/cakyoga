@extends('layouts.quotes')

@section('content')
<div class='uk-container'>
<div class='uk-card'>  
<div class="uk-card-header uk-card-title">
    <a class="uk-button uk-button-primary" href="/quote/create">Add Quotes</a>
</div>
<div class="uk-card-body">
    <div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider">
        <thead>
            <tr>
                <th>Author</th>
                <th>Quote</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotes_tables as $p)
            <tr>
                <td>{{ $p->author }}</td>
                <td>{{ $p->quote }}</td>
                <td>
                    <a href="/quote/edit/{{ $p->id }}" class="uk-button uk-button-default uk-button-small">Edit</a>
                    <a href="/quote/delete/{{ $p->id }}" class="uk-button uk-button-primary uk-button-small">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    </div>
</div>
</div>
</div>
@endsection
