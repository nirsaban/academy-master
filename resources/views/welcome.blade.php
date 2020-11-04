    @extends('layouts.app')
    @section('content')
            <div class="sidenav">
                <div class="login-main-text">
                    <h1>ACADEMYJOB </h1><br /> <h2>Welcome Back !</h2>
                    <p>Login To Your Account.</p>
                </div>
            </div>
            <div class="main">
                <div class="col-md-6 col-sm-12" style="margin-top: 15%">
                    <img
                        src="{{asset('images/logo.jpeg')}}"
                        width="300"
                        class="img-fluid"
                    />
                    <div class="login-form" style="margin-top: 0px;">
                        <form
                        method="POST"
                         action="{{ route('login') }}"
                        >
                        @csrf
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="form-control"
                                required
                            >
                                    @error('email')
                                    <div class="text-danger text-center text-info " style="font-size: 1rem">{{ $message }}</div>
                                    @enderror


                            </div>
                            <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            class="form-control"
                            name="password"
                            required
                        >

                        @error('password')
                                    <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                                    @enderror

                            </div>


                            <button type="submit" class="btn btn-black">
                            Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        <script> window.localStorage.clear() </script>
    @endsection
