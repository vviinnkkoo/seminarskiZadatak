<!-- NAVIGACIJA ZA SLOVA -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand nav-item" href="/">Odaberi početno slovo filma</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLetters" aria-controls="navbarLetters" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarLetters">
            <ul class="navbar-nav mr-auto">
        @foreach (range('A','Z') as $v)
        <li class="nav-item">
            <a class="nav-link" href="/{{$v}}">{{$v}}</a>
        </li>
        @endforeach

            </ul>
        </div>
    </nav>
<!-- END -->