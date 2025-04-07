<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Yume Neko Café</title>
</head>
<body>
<div class="modal fade" id="signInForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sign In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/login" method="POST">
            <div class="mb-3">
                <label for="signInEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="signInEmail" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="signInPassword" name="password" required>
            </div>
            <p>Don't have an account? <a data-bs-toggle="modal" data-bs-target="#signUpForm">Register here!</a></p>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>