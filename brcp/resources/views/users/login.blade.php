
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BRCP | Login</title>
    <!-- BEGIN parsley css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <!-- END parsley css-->

   
   
</head>



<body>
 <!-- Section: Design Block -->
 <section class="font-[Poppins] bg-gradient-to-t from-gray-500 to-white h-screen">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">
     
      <div class="w-full bg-white rounded-lg shadow    sm:max-w-md xl:p-0 ">
        
            <div div class="p-6 space-y-4 md:space-y-6 sm:p-8 p-10">
                <div class="flex justify-center">
                    <img src="img\logo\1.png" alt="" style="width: 150px">
                </div>    
                
              <h1 class="text-sm   text-gray-500 md:text-2xl ">
                  Sign in to your account
              </h1>

              {{-- messages --}}
                <div class=" my-4">
                    @include('includes.messages')
                </div>
              <form class="space-y-4 md:space-y-6" action="{{route('users.auth')}}" method="POST">
                @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-500 ">Your email</label>
                      <input type="email" name="email" id="email" class=" border border-2 border-gray-500 text-gray-500 sm:text-sm rounded-lg   block w-full p-2.5  placeholder-gray-300  " placeholder="email@something.com" required="">
                  </div>
                  <div class="py-3">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-500 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class=" border border-2 border-gray-500 text-gray-500 sm:text-sm rounded-lg   block w-full p-2.5   placeholder-gray-300 " required="">
                  </div>
                  <button type="submit" name="login" class="w-full text-gray-500 border-solid border-2 border-gray-500 bg-white hover:bg-gray-500 hover:text-white rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                  
              </form>
              <div>
                You don't have an <span class="text-red-500">Account</span> <a href="{{route('users.register')}}">Register.</a> 
              </div>
          </div>
        
        
      </div>
  </div>
</section>
  <!-- Section: Design Block -->

</body>
    <!-- BEGIN parsley js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END parsley js-->


     <!-- ================== BEGIN core-js ================== -->
        <script defer src="/your_path_to_version_6_files/js/fontawesome.js"></script>
        <script src="script.js"></script>
    <!-- ================== END core-js ================== -->
</html>