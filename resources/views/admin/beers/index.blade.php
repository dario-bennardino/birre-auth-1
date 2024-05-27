@extends('layouts.admin')

@section('content')
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Gradi</th>
        <th scope="col">Quantità</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($beers as $beer)
        <tr>
          <td>{{ $beer->id }}</td>
          <td>{{ $beer->name }}</td>
          <td>{{ $beer->volume }}%</td>
          <td>{{ $beer->pieces }}</td>
          <td>&euro;{{ $beer->price }}</td>
          <td><a href="{{ route('admin.category.filter', $beer->category) }}">{{ $beer->category->name }}</a></td>
          <td>Otto</td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
