<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 " style="background-color:  #7a4a4a">

    {{-- dark:bg-gray-900 --}}
    <div>
        {{-- {{ $logo }} --}}
        <div style="text-align: center"> <h2 style="color:black;font:bolder;font-size:30px;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
            STATIONARY
        </h2></div>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
