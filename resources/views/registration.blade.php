@extends('template')

@section('content')
<div class="box-registar">
    <form class="form-signin" action="/registration" method="post">
    	@csrf	
        <h1>Регистрация</h1>
        <div class="error"></div>
        <div class="form-group form ">
            <label for="email">Введите ваш email</label>
            <input value="" type="email" name="email" id="email" class="form-control" placeholder="mail@email.com">
        </div>
        <div class="form-group form">
            <label for="name">Введите ваше имя</label>
            <input value="" type="text" name="name" id="name" class="form-control"placeholder="name">
        </div>
        <div class="form-group form">
            <label for="surname">Введите вашу фамилию</label>
            <input value="" type="text" name="surname" id="surname" class="form-control"placeholder="surname">
        </div>
        <div class="form-group form">
            <label for="">Выбериет ваш пол</label>
            <select name="gender" id="select" class="form-control form-control-sm">
                <option value="man">Мужской</option>
                <option value="woman">Женский</option>
            </select>
        </div>
        <div class="form-group form">
            <label for="password">Введите пароль</label>
            <input value="" type="password" name="password" id="password" class="form-control"placeholder="password">
        </div>
        <div class="form-group form">
            <label for="confirm-password">Введите пароль еще раз</label>
            <input value="" type="password" name="confirm-password" id="confirm-password" class="form-control"placeholder="password">
        </div>
        <div class="form-group form">
            <input type="checkbox" name="confirm" id="confirm" >
            <label for="confirm">Я согласен с условиями</label>
        </div>
        <input type="submit" value="Зарегистрироваться" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>
@endsection