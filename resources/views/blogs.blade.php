<x-layout>

  <x-slot:title>{{ $title }}</x-slot:title>

    <div class=" px-4 mx-auto max-w-screen-xl  lg:px-6">
            <form method="get">
              
                @if(request('Category'))
                    <input type="hidden" name="category" value="{{ request('Category') }}">
                @endif

                @if(request('Author'))
                    <input type="hidden" name="author" value="{{ request('Author') }}">
                @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="Search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                          <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                          </svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for Article" type="Search" id="Search" name="Search"  autocomplete="off">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                    </div>
                </div>
            </form>
    </div>

    {{ $blogs->links() }}

  
  
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="grid gap-8 lg:grid-cols-2">       
  @forelse ($blogs as $blog)
      
  
  {{-- <article class="py-5 max-w-screen-md border-b border-gray-300">
    <a href="/blog/{{ $blog['slug'] }}" class="hover:underline">
      <h2 class="mb-2 text-3xl tracking-tight font-bold text-gray-900 ">{{ $blog['title'] }}</h2>
    </a>
      <div class="text-base text-gray-500 ">
        By
        <a href="/authors/{{$blog->author->username }}" class="transition-all duration-300 ease-in-out delay-100  hover:underline"> {{$blog->author->name }} </a>
        In
        <a href="/categories/{{ $blog->category->slug }}" class="transition-all duration-300 ease-in-out delay-100  hover:underline">{{ $blog->category->name }}</a>
        |
        {{ $blog->created_at->diffForHumans() }}
      </div>
        <p class="my-4 font-light">
          {{ Str::limit($blog['content'], 70) }}
        </p>
        <a href="/blog/{{ $blog['slug'] }}" class="font-medium text-blue-600">Read more &raquo;</a>
      </article> --}}
      
      
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                            ><a href="/Blogs?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                        </span>
                        <span class="text-sm"> {{ $blog->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="/blog/{{ $blog['slug'] }}">{{ $blog['title'] }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog['content'], 70) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                            <span class="font-medium dark:text-white">
                              <a href="/Blogs?author={{$blog->author->username }}">{{$blog->author->name }}</a>
                            </span>
                        </div>
                        <a href="/blog/{{ $blog['slug'] }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>                 
            @empty
            <p class="text-gray-500 text-center">No blogs found.</p>
                
            
      @endforelse
    </div>  
  </div>




    </x-layout>