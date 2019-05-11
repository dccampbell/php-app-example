<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP App Example @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="d-flex flex-column">

<header class="container-fluid p-3 bg-white border-bottom box-shadow">
    <div class="row">
        <div class="col">
            <a href="/" class="btn"><h5 class="font-weight-bold m-0">Example Co.</h5></a>
        </div>
        <nav class="col text-right">
            <a href="{{ route('customer.index') }}" class="btn">Manage Customers</a>
        </nav>
    </div>
</header>

<main id="app" class="container mt-4">
    @if($errors->any())
        <div class="alert alert-warning">{{ $errors->first() }}</div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @yield('content')
</main>

<footer class="footer mt-auto py-3 bg-light border-top">
    <div class="container text-center">
        <small class="d-block text-muted text-center">&copy; @php echo date('Y'); @endphp Example Co.</small>
    </div>
</footer>

<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>