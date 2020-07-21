
<footer>
  <div class="lato-sx">
    <div class="logo">
      <img src="{{ asset('img/marcomaialona.png') }}" alt="">
    </div>
    <div class="text">
      <h1>
        Home is where Gian resides.
      </h1>
      <p>
        BoolBnB è un bellissimo portale online che mette in contatto persone in cerca di un alloggio o di una camera per brevi periodi, con persone che dispongono di uno spazio extra da affittare, generalmente privati. <br> Nasce però come prova finale per mettere in pratica le tecnologie apprese in 6 mesi di corso. <br><br> Il sito fu creato nel luglio del 2020 da Alessandro Fraternali, Gianmarco Montanari, Marco Petrini, Riccardo Belli e Umberto Del Piano.
      </p>
    </div>
  </div>
  <div class="lato-dx">
    <div class="container-link">
      <div class="link1">
        <h1>
          Home
        </h1>
        <ul>
          <li>
            <a href="{{ route('home') }}">
              Home
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="http://localhost:8000/login">
              Assistenza
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="{{ route('my_apartments') }}">
              Appartamenti
            </a>
          </li>
        </ul>
      </div>
      <div class="link2">
        <h1>
         Login
        </h1>
        <ul>
          <li>
            <a href="#">
              Login
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="{{ route('register') }}">
              Registrati
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="{{ route('create') }}">
              Diventa Host
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="social">
      <a href="facebook"><img src="{{ asset('img/facebook.png') }}" alt=""></a>
      <a href="facebook"><img src="{{ asset('img/instagram.png') }}" alt=""></a>
      <a href="facebook"><img src="{{ asset('img/whatsapp.png') }}" alt=""></a>
    </div>
  </div>
</footer>
