@extends('layouts.main')
@section('title') Список новостей @parent @stop
@section('content')
<div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Добавть новость</h4>
    <form class="needs-validation" novalidate>
        <div class="row g-3">
        <div class="col-sm-6">
            <label for="firstName" class="form-label">Название</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
            Valid title is required.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="lastName" class="form-label">Краткое описание</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
            Valid short description is required.
            </div>
        </div>

        <div class="col-12">
            <label for="username" class="form-label">Описание</label>
            <div class="input-group has-validation">
            <span class="input-group-text"></></span>
            <textarea class="form-control" id="username" placeholder="Описание" required></textarea>
            <div class="invalid-feedback">
                Your username is required.
            </div>
            </div>
        </div>
    </form>
</div>
    
@endsection
