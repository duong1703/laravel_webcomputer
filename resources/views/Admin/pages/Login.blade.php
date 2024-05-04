<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/easion.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/chart-js-config.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Đăng nhập</title>
</head>

<style>
body {
    background-image: linear-gradient(147deg, transparent 0%, transparent 8%, rgba(63, 106, 202, 0.08) 8%, rgba(63, 106, 202, 0.08) 46%, transparent 46%, transparent 100%), linear-gradient(107deg, transparent 0%, transparent 21%, rgba(63, 106, 202, 0.08) 21%, rgba(63, 106, 202, 0.08) 53%, transparent 53%, transparent 100%), linear-gradient(288deg, transparent 0%, transparent 35%, rgba(63, 106, 202, 0.08) 35%, rgba(63, 106, 202, 0.08) 91%, transparent 91%, transparent 100%), linear-gradient(90deg, rgb(255, 255, 255), rgb(255, 255, 255));
}

.card {
    backdrop-filter: blur(0px) saturate(200%);
    -webkit-backdrop-filter: blur(0px) saturate(200%);
    background-color: rgba(0, 0, 0, 0.3);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
}

/* HTML: <div class="loader"></div> */
/* HTML: <div class="loader"></div> */
.loader {
    width: 50px;
    aspect-ratio: 1;
    display: grid;
    border: 4px solid #0000;
    border-radius: 50%;
    border-right-color: #25b09b;
    animation: l15 1s infinite linear;
}

.loader::before,
.loader::after {
    content: "";
    grid-area: 1/1;
    margin: 2px;
    border: inherit;
    border-radius: 50%;
    animation: l15 2s infinite;
}

.loader::after {
    margin: 8px;
    animation-duration: 3s;
}

@keyframes l15 {
    100% {
        transform: rotate(1turn)
    }
}
</style>

<body>

    <div class="form-screen">
        <img src="{{ asset('images/logo.png') }}" alt="">
        <div class="card account-dialog">
            <div class="card-header text-white"> Vui lòng đăng nhập </div>
            <div class="card-body">
                <div id="login-alerts">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    @endif
                </div>

                <form id="loginForm" action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <div class="account-dialog-actions">
                        <button id="loginButton" type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="loading" class="loader mt-4" style="display:none;"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#loginButton").click(function() {
            // Hiển thị loader
            $("#loading").show();

            // Gửi form đăng nhập
            $("#loginForm").submit();
            setTimeout(function() {
                $("#loginButton").submit(); // Gửi form đăng nhập
            }, 30000);
        });
    });
    </script>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form
        // Sau khi xử lý đăng nhập thành công, hiển thị thông báo và chuyển hướng sau 2 giây
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(function() {
            window.location.href = 'home'; // Chuyển hướng đến trang chủ
        }, 30000); // Thời gian hiển thị thông báo thành công (ms)
    });
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src=" {{ asset('js/easion.js') }}"></script>
</body>

</html>