@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-4 mt-1 ml-1">
        <a href="{{ route('logout') }}"><button class="btn btn-primary">Logout</button></a>
    </div>
</div>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>CEP</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                <td>{{ $user->nome }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->cep }}</td>
                </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@endsection