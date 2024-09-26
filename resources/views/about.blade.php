<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
        <div class="max-w-2xl">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet our developer</h2>
          <p class="mt-6 text-lg leading-8 text-gray-600">Nama Saya Dion Ahza Rabbani,Lahir di jakarta 18
            Maret 2007, Saya anak ke 3 dari 3 bersaudara,
            Hobby saya bermain gitar dan sepak bola</p>
        </div>
        <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
          <li>
            <div class="flex items-center gap-x-6">
              <img class="h-16 w-16 rounded-full" src="https://media.licdn.com/dms/image/v2/D5603AQEbh-ujPtsQGg/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1718229667829?e=1731542400&v=beta&t=gPgtKb8XQXVTjjAdqDUa6Sr6tOE21WOW48kdk4dAVtE" alt="">
              <div>
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $nama }}</h3>
                <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $email }}</p>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <a href="https://www.linkedin.com/in/dionahza-undefined-885a252a4/" target="_blank" class="hover:underline">
                  <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                  <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/></a>
                </svg>
                
              </div>
            </div>
          </li>
    
          <!-- More people... -->
        </ul>
      </div>
    </div>
    
  </x-layout>  
 