<!DOCTYPE html>
<html>
<head>
<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12 row-block">
<a href="{{ url('auth/github') }}" class="btn btn-lg btn-primary btn-block">
<strong>Login onto Github</strong>
</a> 
</div>
</div>
</div>
</body>
</html>