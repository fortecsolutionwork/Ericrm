<!doctype html>

<head>
  <title>Presentation Design Agency | PowerPoint Design - Slidor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
</head>
<style>
  body .container {
    position: relative;
    left: -50%;
    top: -50%;
    transform: translate(50%, 50%);
  }

  .unauth {
    text-align: center;
  }

  .unauth p {
    font-size: 32px;
    text-transform: uppercase;
  }

  .unauth a {
    padding: 15px;
    background-color: dodgerblue;
    color: #fff;
    font-size: 20px;
    border-radius: 5px;
  }
</style>

<body>
  @php
  $baseUrl = url('/');
  $adminUrl = $baseUrl."/admin/dashboard";
  $account = $baseUrl."/account/dashboard";
  @endphp
  <section>
    <div class="container unauth">
      <img src="{{ asset('images/unauth.png') }}">
      <p> unauthorized 401 error </p>
      <a href="{{$role->fk_role_id ==1?$adminUrl:$account}}"> Back to Dashboard </a>
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>


</body>

</html>