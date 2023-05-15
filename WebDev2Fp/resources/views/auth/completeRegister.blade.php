<!DOCTYPE html>
<html lang="eng">

<Head>
    <meta charset="utf-8">
    <title>Complete Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styleRL.css') }}">

    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>

</Head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    
    <div
      class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1"
    >
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
        <div>
         
        </div>
        <div class="mt-12 flex flex-col items-center">
          <h1 class="text-2xl xl:text-3xl font-extrabold">
            There are some information we need before Register
        </h1>
          <div class="w-full flex-1 mt-8">
            <div class="flex flex-col items-center">
              
                <div class="bg-white p-2 rounded-full">
                  
                </div>
    <form method="POST" action="{{ route('storeSProfile') }}" style="display:flex;flex-direction:column;gap:15px">

        @csrf
                <div style="justify-content: center;display: flex;margin-top: 14px;border-width: 3px;height: 40px;border-radius: 5px;">
                    <input type="date" id="birthday" name="birthday" value="{{old('birthday')}}">
                </div>
                 
                @if ($errors->has('birthday'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('birthday') }}</strong>
                 </span>
                @endif
                <div style="gap: 12px;display: flex;margin-top: 16px;">
                <input type="radio" id="Male" name="gender" value="Male">
                      <label for="Male">Male</label>
                      <input type="radio" id="Female" name="gender" value="Female">
                      <label for="Female">Female</label>
                      <input type="radio" id="PreferN" name="gender" value="null">
                      <label for="PreferN">Perfer not</label>
    </div>
                    @if ($errors->has('gender'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('gender') }}</strong>
                 </span>
                @endif

                <input type="text"  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="phonenumber" value="{{old('phonenumber')}}">
                @if($errors->has('phonenumber'))
                <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('phonenumber') }}</strong>
                 </span>
                @endif

                <button type="submit" style="margin-top: 16px;background: #e55;margin-bottom: 8px;"
                class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
              >
                <svg
                  class="w-6 h-6 -ml-2"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="8.5" cy="7" r="4" />
                  <path d="M20 8v6M23 11h-6" />
                </svg>
                <span class="ml-3">
                  Sign Up
                </span>
              </button>
              <a class="btn btn-link" href="{{ route('login') }}" style="margin-top:5px;color: #5151ff;font-size:15px">Do you already have an account? Login Now!</a>
              <p class="mt-6 text-xs text-gray-600 text-center">
                I agree to abide by Foodies's
                <a href="{{Route('downloadTerms')}}" class="border-b border-gray-500 border-dotted">
                  Terms of Service
                </a>
                and its
                <a href="{{Route('downloadPrivacy')}}" class="border-b border-gray-500 border-dotted">
                  Privacy Policy
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');"
        ></div>
      </div>
    </form>
</body>
</html>