<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>

    <body>
        @include('includes.header')
        <br /><br />
        @yield('conteudo')

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ URL::to('/')}}/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::to('/')}}/js/bootstrap.min.js"></script>
    </body>
</html>