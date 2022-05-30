<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("DBoard/img/apple-icon.png") }}">
  <link rel="icon" type="image/png" href="{{ asset("DBoard/img/favicon.png") }}">
  <title>
    Vartafrica Admin Dashboard - @yield("title")
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset("DBoard/css/nucleo-icons.css") }}" rel="stylesheet" />
  <link href="{{ asset("DBoard/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset("DBoard/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset("DBoard/css/soft-ui-dashboard.css?v=1.0.3") }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>

  /*
   CREDIT / MOSTLY TAKEN FROM:
   http://wtfforms.com/wtf-forms.css
  */


  /*
   * Select
   */

  .select {
    position: relative;
    margin-top: 10px;
    display: inline-block;
    width: 100%;
    color: #555;
  }
  .select select {
    display: inline-block;
    width: 100%;
    margin: 0;
    padding: .5rem 2.25rem .5rem 1rem;
    line-height: 1.5;
    color: #555;
    background-color: #eee;
    border: 0;
    border: 1px solid #D0D0D0;
    border-radius: .25rem;
    cursor: pointer;
    outline: 0;
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
  }
  /* Undo the Firefox inner focus ring */
  .select select:focus:-moz-focusring {
    color: transparent;
    text-shadow: 0 0 0 #000;
  }
  /* Dropdown arrow */
  .select:after {
    position: absolute;
    top: 50%;
    right: 1.25rem;
    display: inline-block;
    content: "";
    width: 0;
    height: 0;
    margin-top: -.15rem;
    pointer-events: none;
    border-top: .35rem solid;
    border-right: .35rem solid transparent;
    border-bottom: .35rem solid transparent;
    border-left: .35rem solid transparent;
  }

  /* Hover state */
  /* Uncomment if you need it, but be aware of the sticky iOS states.
  .select select:hover {
    background-color: #ddd;
  }
  */

  /* Focus */
  .select select:focus {
    box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #0074d9;
  }

  /* Active/open */
  .select select:active {
    color: #fff;
    background-color: #0074d9;
  }

  /* Hide the arrow in IE10 and up */
  .select select::-ms-expand {
    display: none;
  }

  /* Media query to target Firefox only */
  @-moz-document url-prefix() {
    /* Firefox hack to hide the arrow */
    .select select {
      text-indent: 0.01px;
      text-overflow: '';
      padding-right: 1rem;
    }

    /* <option> elements inherit styles from <select>, so reset them. */
    .select option {
      background-color: white;
    }
  }

  /* IE9 hack to hide the arrow */
  @media screen and (min-width:0\0) {
    .select select {
      z-index: 1;
      padding: .5rem 1.5rem .5rem 1rem;
    }
    .select:after {
      z-index: 5;
    }
    .select:before {
      position: absolute;
      top: 0;
      right: 1rem;
      bottom: 0;
      z-index: 2;
      content: "";
      display: block;
      width: 1.5rem;
      background-color: #eee;
    }
    .select select:hover,
    .select select:focus,
    .select select:active {
      color: #555;
      background-color: #eee;
    }
  }


  /* Input part is easier */
  input[type="text"],
  select {
    font-family: sans-serif;
    font-size: 15px;
  }
  .input-wrap {
    margin: 0 0 20px 0;
  }
  input[type="text"] {
    padding: 10px 15px;
    border-radius: 5px;
    border: 1px solid #D0D0D0;
    width: 100%;
    box-sizing: border-box; /* if you already aren't doing universally */
  }




  /* Doesn't matter */
  body {
    background: #EBEDF1;
  }
  .widget {
    max-width: 400px;
    margin: 50px auto;
    background: #F3F3F3;
    padding: 20px;
    border: 1px solid #DCDCDC;
    border-radius: 5px;
  }

  </style>
  @if($loadDataTable ?? false)
      <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" />
  @endif
  @yield('css')
 </head>
