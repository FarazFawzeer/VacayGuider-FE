<!DOCTYPE html>
<html lang="en">

<head>
    
 @include('frontend.partials.header')
    <title>VacayGuider</title>

</head>

<body>
    @include('frontend.partials.nav')
 
        @yield('content')
 

        @include('frontend.partials.footer')

</body>

</html>
