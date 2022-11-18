@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4" style="margin-left: 33%; margin-top: 20%">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Esqueceu a senha?</h2>
                  <p>Insira seu email abaixo e enviaremos um email de recuperação para você.</p>
                  <div class="panel-body">
    
                    <form method="POST" action="{{ route('forgot') }}">
                        @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block mt-1" value="Recuperar Senha" type="submit">
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
@endsection