<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/" title="postalandzipcodes.ph">
      <img src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto/v1576734741/postalandzipcodes.ph/POSTALANDZIPCODESPH_SQUARE.png" class="img-fluid" width="60px" alt="postalandzipcodes.ph logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item @if(\Request::is('/'))active @endif">
        <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if(\Request::is('what-is-my-zip-code'))active @endif">
        <a class="nav-link" href="/what-is-my-zip-code" title="Get your current location's zip code information.">
            MY ZIPCODE
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LINKS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/terms-of-service">Terms of Service</a>
          <a class="dropdown-item" href="/privacy-policy">Privacy Policy</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/how-it-works">How it works?</a>
          <a class="dropdown-item" href="/about-us">About</a>
        </div>
      </li>
    </ul>
        
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="form-inline my-2 my-lg-0">
        <small class="text-muted" title="Was this useful? Treat us a Coffee.">MAY SILBI BA? PANG KAPE NAMAN DYAN.</small>&nbsp;
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="P35YJLS62TDLL" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_PH/i/scr/pixel.gif" width="1" height="1" />
    </form>

  </div>
  
</nav>