<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-200">
    {{-- header --}}
    <div class="fixed w-full">
    <div class="flex justify-between m-2 font-serif font-semibold text-lg">
        <h1 class="">Online Library management System</h1>
        <ul class="flex">    
            <a href="index"><li class="mx-2 border-1 hover:border-b-black">Home</li></a>
            <a href="adminLogin"><li class="mx-2 border-1 hover:border-b-black">Admin Login</li></a>
            <a href="login"><li class="mx-2 border-1 hover:border-b-black">User Login</li></a>
        </ul>
    </div>
    </div>
    {{-- main --}}
    @hassection('loginMain')
    @yield('loginMain')
    @else
    <div class="flex place-items-center justify-center h-screen w-full">
    <i class='bx bxs-skip-previous-circle text-5xl cursor-pointer left'></i>
        <div class="h-[80vh] w-[80%] border-1 border-white grid overflow-hidden transform delay-200 ease-in-out slider">
            <img src="/storage/img/image.png " class="h-[100%] w-[100%] object-cover  transition delay-100 ease-linear img">
            <img src="/storage/img/image1.png " class="h-[100%] w-[100%] object-cover transition delay-100 ease-linear img">
            <img src="/storage/img/image2.png " class="h-[100%] w-[100%] object-cover transition delay-100 ease-linear img">
            <img src="/storage/img/image3.png " class="h-[100%] w-[100%] object-cover transition delay-100 ease-linear img">
        </div>
    <i class='bx bxs-skip-previous-circle text-5xl rotate-180 cursor-pointer right'></i>
    </div>
    <script>
        let left = document.querySelector('.left');
        let right = document.querySelector('.right');
        let slides = document.querySelectorAll('.img');
        
        let slideIndex = 0;
        left.addEventListener('click',()=>{
            slides[slideIndex].removeAttribute('style');
            slideIndex = (slideIndex===0) ? slides.length-1 : slideIndex - 1;
            slides[slideIndex].style.transform = `translateY(-${slideIndex * 100}%)`;
        })

        right.addEventListener('click',()=>{
            slides[slideIndex].removeAttribute('style');
            slideIndex = (slideIndex===slides.length-1) ? 0 : slideIndex + 1;
            slides[slideIndex].style.transform = `translateY(-${slideIndex * 100}%)`;
        })
    </script>
    @endif 
    </body>
</html>