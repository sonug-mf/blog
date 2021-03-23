<!doctype html>
<html lang="en">
    <head>
        <title>Laravel From Scratch Blog</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            .form-element{
                width: 100%;
                padding: 10px;
                border: 1px lightcyan;
                border-radius: 20px;
            }

            .form-group{
                margin-top: 5px;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">
            @include('common.nav-bar')

            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <h1>Login Form</h1>

                <div class="col-span-10 bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                    <form method="post" action="/login">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-element" name="email" placeholder="Enter Email Address" />
                            <span style="color: red; padding: 2px; float: left; margin-left: 14px;">@error('email') {{ $message }} @enderror</span>
                        </div>

                        <div>
                            <input type="password" class="form-element" name="password" placeholder="Enter Password" />
                            <span style="color: red; padding: 2px; float: left; margin-left: 14px;">@error('password') {{ $message }} @enderror</span>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit" style="float: right; margin-top: 17px;">Login</button>
                        </div>
                    </form>
                </div>
            </main>

            <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    @include('common.subscribe')
                </div>
            </footer>
        </section>
    </body>
</html>