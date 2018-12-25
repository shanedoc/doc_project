<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBS') - Marry Christmas</title>

    <!-- Styles -->
    <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
</head>

<body>
<div id="app" class="layouts-page">

    @include('layouts._header')

    <div class='sui-container'>

        @yield('content')

    </div>

    {{--@include('layouts._footer')--}}
</div>

<!-- Scripts -->
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript" src="{{URL::asset('/common/common.js')}}"></script>
</body>

</html>