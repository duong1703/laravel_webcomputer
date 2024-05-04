@include('client.layout.header')

@include('client.layout.slide')

<body>
    
    <section>
        <div class="container">
           @yield('content')
        </div>
    </section>
</body>
@include('client.layout.footer')

