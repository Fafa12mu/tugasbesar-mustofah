<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register</title>

    <style>
      html, body {
        height: 100%;
      }
      .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      }
      .card {
        width: 100%;
        max-width: 400px;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="/registrasi" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputName">Name</label>
                              <input type="text" class="form-control" name="rname" required autofocus>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" name="remail" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" name="rpassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="/">Already have an account? Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
