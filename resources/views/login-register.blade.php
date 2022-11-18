@extends('layout')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-left: 25%; margin-top: 13%">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                            aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                            aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control" />
                            <label class="form-label" for="email">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label" for="password">Senha</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

                            <!-- 2 column grid layout -->
                            <div class="row mb-4 text-center">
                                <!-- Simple link -->
                                <a href="{{ route('forgot-password') }}">Esqueceu a senha?</a>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                            <input type="text" id="registerName" name="nome" class="form-control" />
                            <label class="form-label" for="registerName">Nome Completo</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" name="email" class="form-control" />
                            <label class="form-label" for="registerEmail">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="cep" name="cep" class="form-control" />
                                <label class="form-label" for="cep">CEP</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="rua" name="rua" class="form-control" />
                                <label class="form-label" for="rua">Rua</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="bairro" name="bairro" class="form-control" />
                                <label class="form-label" for="bairro">Bairro</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="numero" name="numero" class="form-control" />
                                <label class="form-label" for="numero">Número</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="cidade" name="cidade" class="form-control" />
                                <label class="form-label" for="cidade">Cidade</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="estado" name="estado" class="form-control" />
                                <label class="form-label" for="estado">Estado</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label" for="password">Senha</label>
                            </div>

                            <!-- Repeat Password input -->
                            <div class="form-outline mb-4">
                            <input type="password" id="confirmaSenha" name="confirmaSenha" class="form-control" />
                            <label class="form-label" for="confirmaSenha">Confirme sua Senha</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-3">Cadastrar</button>
                        </form>
                        </div>
                    </div>
                    <!-- Pills content -->
                    @if(isset($error))
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endif
                </div>
            </div>
             
        </div>
@endsection