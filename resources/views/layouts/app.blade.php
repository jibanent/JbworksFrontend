<html>

<head>
  <title>Project - Base Wework</title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta name="AUTHOR" content="base.vn">
  <meta name="COPYRIGHT" content="base.vn">
  <meta name="SERVER_ID" content="172.18.0.2">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#2a91d6">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="google-site-verification" content="H6n0qvxxImzZ9U2PbJlpWCDAwlvafPTDnXvXf2k52zw">
  <meta name="google-site-verification" content="hQUStnyX4Akql-OXPdx12EV_JsEgmcu0z4t8drRIpT4">
  <meta name="keywords" content="Project, project management,">
  <meta name="description" content="Project management">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">
  <link rel="stylesheet" href={{ asset('assets/css/vendor.css') }}>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin">
  <style>
    .lds-dual-ring:after {
      content: " ";
      display: block;
      width: 64px;
      height: 64px;
      margin: 8px;
      border-radius: 50%;
      border: 6px solid #ccc;
      border-color: #ccc transparent #ccc transparent;
      animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>
  <div id="app">
    <app></app>
  </div>
</body>

</html>
