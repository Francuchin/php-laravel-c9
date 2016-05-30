 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style type="text/css">
  body {
    background: #e9e9e9;
    color: #666666;
    font-family: 'RobotoDraft', 'Roboto', sans-serif;
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}


/* Container */

.container {
    position: relative;
    max-width: 460px;
    width: 100%;
    margin: 0 auto 100px;
}

.container.active .card:first-child {
    background: #f2f2f2;
    margin: 0 15px;
}

.container.active .card:nth-child(2) {
    background: #fafafa;
    margin: 0 10px;
}

.container.active .card.alt {
    top: 20px;
    right: 0;
    width: 100%;
    min-width: 100%;
    height: auto;
    border-radius: 5px;
    padding: 60px 0 40px;
    overflow: hidden;
}

.container.active .card.alt .toggle {
    position: absolute;
    top: 40px;
    right: -70px;
    box-shadow: none;
    -webkit-transform: scale(10);
    transform: scale(10);
    -webkit-transition: -webkit-transform .3s ease;
    transition: -webkit-transform .3s ease;
    transition: transform .3s ease;
    transition: transform .3s ease, -webkit-transform .3s ease;
}

.container.active .card.alt .toggle:before {
    content: '';
}

.container.active .card.alt .title,
.container.active .card.alt .input-container,
.container.active .card.alt .button-container {
    left: 0;
    opacity: 1;
    visibility: visible;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.container.active .card.alt .title {
    -webkit-transition-delay: .3s;
    transition-delay: .3s;
}

.container.active .card.alt .input-container {
    -webkit-transition-delay: .4s;
    transition-delay: .4s;
}

.container.active .card.alt .input-container:nth-child(2) {
    -webkit-transition-delay: .5s;
    transition-delay: .5s;
}

.container.active .card.alt .input-container:nth-child(3) {
    -webkit-transition-delay: .6s;
    transition-delay: .6s;
}

.container.active .card.alt .button-container {
    -webkit-transition-delay: .7s;
    transition-delay: .7s;
}


/* Card */

.card {
    position: relative;
    background: #ffffff;
    border-radius: 5px;
    padding: 60px 0 40px 0;
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card:first-child {
    background: #fafafa;
    height: 10px;
    border-radius: 5px 5px 0 0;
    margin: 0 10px;
    padding: 0;
}

.card .title {
    position: relative;
    z-index: 1;
    border-left: 5px solid #ed2553;
    margin: 0 0 35px;
    padding: 10px 0 10px 50px;
    color: #ed2553;
    font-size: 32px;
    font-weight: 600;
    text-transform: uppercase;
}

.card .input-container {
    position: relative;
    margin: 0 60px 50px;
}

.card .input-container input {
    outline: none;
    z-index: 1;
    position: relative;
    background: none;
    width: 100%;
    height: 60px;
    border: 0;
    color: #212121;
    font-size: 24px;
    font-weight: 400;
}

.card .input-container input:focus ~ label {
    color: #9d9d9d;
    -webkit-transform: translate(-12%, -50%) scale(0.75);
    transform: translate(-12%, -50%) scale(0.75);
}

.card .input-container input:focus ~ .bar:before,
.card .input-container input:focus ~ .bar:after {
    width: 50%;
}

.card .input-container input:valid ~ label {
    color: #9d9d9d;
    -webkit-transform: translate(-12%, -50%) scale(0.75);
    transform: translate(-12%, -50%) scale(0.75);
}

.card .input-container label {
    position: absolute;
    top: 0;
    left: 0;
    color: #757575;
    font-size: 24px;
    font-weight: 300;
    line-height: 60px;
    -webkit-transition: 0.2s ease;
    transition: 0.2s ease;
}

.card .input-container .bar {
    position: absolute;
    left: 0;
    bottom: 0;
    background: #757575;
    width: 100%;
    height: 1px;
}

.card .input-container .bar:before,
.card .input-container .bar:after {
    content: '';
    position: absolute;
    background: #ed2553;
    width: 0;
    height: 2px;
    -webkit-transition: .2s ease;
    transition: .2s ease;
}

.card .input-container .bar:before {
    left: 50%;
}

.card .input-container .bar:after {
    right: 50%;
}

.card .button-container {
    margin: 0 60px;
    text-align: center;
}

.card .button-container button {
    outline: 0;
    cursor: pointer;
    position: relative;
    display: inline-block;
    background: 0;
    width: 240px;
    border: 2px solid #e3e3e3;
    padding: 20px 0;
    font-size: 24px;
    font-weight: 600;
    line-height: 1;
    text-transform: uppercase;
    overflow: hidden;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card .button-container button span {
    position: relative;
    z-index: 1;
    color: #ddd;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card .button-container button:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    display: block;
    background: #ed2553;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card .button-container button:hover,
.card .button-container button:active,
.card .button-container button:focus {
    border-color: #ed2553;
}

.card .button-container button:hover span,
.card .button-container button:active span,
.card .button-container button:focus span {
    color: #ed2553;
}

.card .button-container button:active span,
.card .button-container button:focus span {
    color: #ffffff;
}

.card .button-container button:active:before,
.card .button-container button:focus:before {
    opacity: 1;
    -webkit-transform: scale(10);
    transform: scale(10);
}

.card .footer {
    margin: 40px 0 0;
    color: #d3d3d3;
    font-size: 24px;
    font-weight: 300;
    text-align: center;
}

.card .footer a {
    color: inherit;
    text-decoration: none;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card .footer a:hover {
    color: #bababa;
}

.card.alt {
    position: absolute;
    top: 40px;
    right: -70px;
    z-index: 10;
    width: 140px;
    height: 140px;
    background: none;
    border-radius: 100%;
    box-shadow: none;
    padding: 0;
    -webkit-transition: .3s ease;
    transition: .3s ease;
}

.card.alt .toggle {
    position: relative;
    background: #ed2553;
    width: 140px;
    height: 140px;
    border-radius: 100%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    color: #ffffff;
    font-size: 58px;
    line-height: 140px;
    text-align: center;
    cursor: pointer;
}

.card.alt .toggle:before {
    content: '\f040';
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
}

.card.alt .title,
.card.alt .input-container,
.card.alt .button-container {
    left: 100px;
    opacity: 0;
    visibility: hidden;
}

.card.alt .title {
    position: relative;
    border-color: #ffffff;
    color: #ffffff;
}

.card.alt .title .close {
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 60px;
    display: inline;
    color: #ffffff;
    font-size: 58px;
    font-weight: 400;
}

.card.alt .title .close:before {
    content: '\00d7';
}

.card.alt .input-container input {
    color: #ffffff;
}

.card.alt .input-container input:focus ~ label {
    color: #ffffff;
}

.card.alt .input-container input:focus ~ .bar:before,
.card.alt .input-container input:focus ~ .bar:after {
    background: #ffffff;
}

.card.alt .input-container input:valid ~ label {
    color: #ffffff;
}

.card.alt .input-container label {
    color: rgba(255, 255, 255, 0.8);
}

.card.alt .input-container .bar {
    background: rgba(255, 255, 255, 0.8);
}

.card.alt .button-container button {
    width: 100%;
    background: #ffffff;
    border-color: #ffffff;
}

.card.alt .button-container button span {
    color: #ed2553;
}

.card.alt .button-container button:hover {
    background: rgba(255, 255, 255, 0.9);
}

.card.alt .button-container button:active:before,
.card.alt .button-container button:focus:before {
    display: none;
}


</style>

<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>

<script src="/js/jquery.min.js"></script>
<script type="text/javascript">

  $('.toggle').on('click', function() {  
      $('.container').stop().addClass('active');
    });

  $('.close').on('click', function() {  
      $('.container').stop().removeClass('active');
    });

</script>