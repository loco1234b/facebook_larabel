<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../img/faceboook.ico" rel="shortcut icon" sizes="196x196">
    <title>Registrate en Facebook</title>
    <link rel="stylesheet" href="{{asset('css/registro.css')}}">
    <script src="https://www.gstatic.com/firebasejs/11.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/11.0.1/firebase-auth.js"></script>
    <script src="../js/registro.js"></script>    
</head>

<body>
    <div class="main">
        <form method="POST" action="{{route('registro')}}">
            @csrf
            <h2 class="first_title">Crea una cuenta</h2>
            <p class="first_sub_title" id="sub_title">Es rápido y fácil.</p>
            <hr />
            <div class="input">
                <input type="text" name="nombres" placeholder="Nombre" class="first_name" id="all" required />
                <input type="text" name="apellidos" placeholder="Apellidos" class="surce_name" id="all" required />
            </div>
            <p class="sub_title_2" id="sub_title">Fecha de Nacimiento</p>
            <select name="diaNacimiento">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>

            <select name="mesNacimiento">
                <option value="ene">ene.</option>
                <option value="feb">feb.</option>
                <option value="mar">mar.</option>
                <option value="abr">abr.</option>
                <option value="may">may.</option>
                <option value="jun">jun.</option>
                <option value="jul">jul.</option>
                <option value="ago">ago.</option>
                <option value="sep">sep.</option>
                <option value="oct">oct.</option>
                <option value="nov">nov.</option>
                <option value="dic">dic.</option>
            </select>

            <select name="anoNacimiento">
                <option>2024</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
                <option>2014</option>
                <option>2013</option>
                <option>2012</option>
                <option>2011</option>
                <option>2010</option>
                <option>2009</option>
                <option>2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
                <option>2004</option>
                <option>2003</option>
                <option>2002</option>
                <option>2001</option>
                <option>2000</option>
                <option>1999</option>
            </select>

            <br />

            <p class="sub_title_3" id="sub_title">Género</p>
            <div class="female" id="all_gender">
                <label for="female"><b>Mujer</b> </label>
                <input type="radio" name="genero" value="Mujer" />
            </div>
            <div class="male" id="all_gender">
                <label for="male"><b>Hombre</b></label>
                <input type="radio" name="genero" value="Hombre" />
            </div>
            <div class="other" id="all_gender">
                <label for="other"><b>Personalizado</b></label>
                <input type="radio" name="genero" value="Personalizado" />
            </div>

            <div class="input">
                <input type="number" name="telefono" placeholder="Número de móvil" id="all1" required />
                <br />
                <input type="email" name="correo" placeholder="correo electrónico" id="all1" required />
                <br />
                <input type="password" name="password" placeholder="Contraseña nueva" id="all1" required />
                <br />
            </div>

            <br />
            <p class="sub_title_4">
                Al hacer clic en Registrarte, aceptas las Condiciones, la <a
                    href="https://www.facebook.com/privacy/policy/?entry_point=data_policy_redirect&entry=0"> Política
                    de privacidad</a> y la
                <a href="https://www.facebook.com/privacy/policies/cookies/?entry_point=cookie_policy_redirect&entry=0">Política
                    de cookies</a>. Es posible que te enviemos notificaciones por SMS, que podrás desactivar cuando quieras.
            </p>
            <input type="submit" value="Registrate" class="submit" />
            <p class="volver-texto">ya tienes cuenta? <a href="{{route('login')}}" class="volver">Inicia sesion</a></p>
        </form>
    </div>
    
</body>

</html>