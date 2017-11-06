<h2>Добро пожаловать, {{\Auth::user()->email}}</h2>
<br>
@if(\Auth::user()->isAdmin == 1)
<a href="{{ route('admin') }}">В админку</a><br>
@endif
<a href="{{ route('logout')  }}">Выйти</a>