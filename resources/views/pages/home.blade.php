@extends('layouts.home')


@section('title','home portofolio-project')


@section('content')

    <!-- navbar -->
    <nav class=" max-w-6xl mx-auto bg-white flex flex-wrap items-center  py-8 px-4">
        <div class="flex-1 flex  justify justify-between items-center">
            <a href="/" class="flex text-xl text-[#3F0B43] font-bold">
                PORTOFOLIO-PROJECTS
            </a>
        </div>

        <label for="menu-toggle" class="cursor-pointer lg:hidden block">
          <svg
            class="fill-current text-gray-900"
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 20 20"
          >
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </label>

        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
          <nav>
            <ul class="text-base text-center items-center gap-x-5 pt-4 md:gap-x-12 lg:text-base lg:flex   lg:pt-0">
                <li class="py-4 lg:py-0 ">
                    <a
                    class="text-[#3F0B43] hover:pb-4 hover:border-b-4 hover:border-[#3F0B43]"
                    href="#"
                    >
                    Home
                    </a>
                </li>
                <li class="py-4 lg:py-0 ">
                    <a
                    class="text-[#3F0B43] hover:pb-4 hover:border-b-4 hover:border-[#3F0B43]"
                    href="#"
                    >
                    About
                    </a>
                </li>
                <li class="py-4 lg:py-0 ">
                    <a
                    class="text-[#3F0B43] hover:pb-4 hover:border-b-4 hover:border-[#3F0B43]"
                    href="#"
                    >
                    Project
                    </a>
                </li>
                <li class="py-4 lg:py-0 ">
                    <a
                    class="text-[#3F0B43] hover:pb-4 hover:border-b-4 hover:border-[#3F0B43]"
                    href="#"
                    >
                    Social Media
                    </a>
                </li>
                <li class="py-6 ">
                    <a
                    class="text-white font-bold  hover:border-white bg-[#3F0B43] px-4 py-2 rounded-md"
                    href="{{ route('login') }}"
                    >
                    Login
                    </a>
                </li>
             
            </ul>
          </nav>
        </div>
    </nav>

    <!-- about us -->
    <section class="about max-w-6xl mx-auto py-12 px-8">
        <div class="flex md:flex-row flex-col items-center gap-x-24 gap-y-10">
            <div class="flex flex-row items-center">
                <img src="{{ asset('/frontend/assets/logo.png') }}" alt="" >
            </div>
            
            <div class="flex flex-col gap-y-10">
                
                <div class="gap-y-2 flex flex-col">
                    <h1 class="text-3xl text-[#3F0B43] font-bold leading-none">
                        PORTOFOLIO-PROJECTS
                    </h1>
                    <p class=" text-base leading-loose text-gray-500">
                        Portofolio projects adalah projek - projek yang pernah dibuat oleh kami untuk di tunjukkan kepada client -client yang ingin membuat aplikasinya
                    </p>
                    <div class="flex flex-wrap gap-x-4 gap-y-2">
                        <img src="{{ asset('frontend/assets/about.jpg') }}" alt="" class="w-[160px]">
                        <img src="{{ asset('frontend/assets/about3.png') }}" alt="" class="w-[160px]">
                        <img src="{{ asset('frontend/assets/about4.png') }}" alt="" class="w-[160px]">
                    </div>
                </div>
            
              
            </div>
           

        </div>
            
    </section>

    <!-- section untuk project -->
    <section class="project max-w-6xl mx-auto py-12 px-4">
      <h3 class="text-[#3F0B43] text-4xl font-bold mb-8">Project Kami</h3>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-4">
              @foreach($projects as $project)
                <div class="my-card-project flex flex-col px-4 py-6 bg-[#F6EEF7] rounded-2xl gap-y-4 items-center transition-transform duration-300 ease-in-out hover:bg-white shadow-md">
                  <div class="img-card text-center items-center justify-center">
                    <a href="{{ Storage::url($project->galleries->first()->image_project) }}" class="xzoom" xoriginal="{{ Storage::url($project->galleries->first()->image_project) }}">
                        <img class="xzoom-gallery" src="{{ Storage::url($project->galleries->first()->image_project) }}" alt="Main Image">
                    </a>

                    <div class="xzoom-thumbs-container flex justify-center mt-4 px-2 gap-2">
                        <!-- xZoom thumbs -->
                        @foreach($project->galleries as $gallery)
                            <a href="{{ Storage::url($gallery->image_project) }}" class="xzoom-gallery-thumb-link" data-preview="{{ Storage::url($gallery->image_project) }}">
                                <img src="{{ Storage::url($gallery->image_project) }}" alt="Thumb {{ $loop->index + 1 }}" class="xzoom-gallery-thumb" width="150px" height="150px">
                            </a>
                        @endforeach
                    </div>


                  </div>

                  <div class="describe-card w-full px-7 py-6 bg-[#FFF] rounded-2xl">
                      <a class="btn-card ">
                          <h5 class="text-[#3F0B43] font-bold">{{ $project->title }}</h5>
                          <p class="text-gray-500 text-[#14px}">
                          {{ $project->liris }}
                          </p>
                          <p class="text-[#3F0B43] font-regular text-[14px]">
                              {{ $project->desc }}
                          </p>
                          <div class=" buttons-container flex md:flex-row flex-col text-center gap-x-2  gap-y-4">
                              <a href="{{ $project->link_demo }}" target="_blank" class="btn-demo bg-[#D9D9D9] hover:font-bold text-[#000000] text-[12px] py-2 px-2 rounded-md md:mb-0">Link Demo</a>
                              <a href="{{ $project->link_hubungi }}" target="_blank" class="btn-hubungi text-[#FFF] text-[12px] hover:font-bold bg-[#3F0B43] py-2 px-2 rounded-md">Join Now</a>
                              <a href="{{ Storage::url($project->panduan) }}" target="_blank" class="btn-hubungi text-[#FFF] text-[12px] hover:font-bold bg-[#3F0B43] py-2 px-2 rounded-md">Panduan</a>
                          </div>
                      </a>
                  </div>
                </div>

              @endforeach
          </div>
      </div>
    </section>

    <!-- section untuk sosial media -->
    <section class="sosmed max-w-6xl mx-auto py-12 px-4">
        <h3 class="text-[#3F0B43] text-4xl font-bold mb-8">Social Media Kami</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-3 gap-x-2 gap-y-4 ">
            <div class="my-card-sosmed flex flex-col  py-6 rounded-2xl gap-y-4 items-center transition-transform duration-300 ease-in-out hover:bg-white ">
                <div class="img-card text-center items-center justify-center">
                    <img class="" src="{{ asset('frontend/assets/Facebook.png') }}" alt="">
                </div>
                
               
            </div>

            <div class="my-card-sosmed flex flex-col  py-6 rounded-2xl gap-y-4 items-center transition-transform duration-300 ease-in-out hover:bg-white ">
                <div class="img-card text-center items-center justify-center">
                    <img class="" src="{{ asset('frontend/assets/Instagram.png') }}" alt="">
                </div>
                
               
            </div>

            <div class="my-card-sosmed flex flex-col  py-6 rounded-2xl gap-y-4 items-center transition-transform duration-300 ease-in-out hover:bg-white ">
                <div class="img-card text-center items-center justify-center">
                    <img class="" src="{{ asset('frontend/assets/Linkedin.png') }}" alt="">
                </div>
                
               
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="relative bg-[#3F0B43] pt-8 pb-6">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
              <h4 class="text-3xl font-bold text-white">PORTOFOLIO-PROJECTS</h4>
              <P class="text-base mt-0 mb-2 text-white">
                Portofolio projects adalah projek - projek yang pernah dibuat oleh kami untuk di tunjukkan kepada client -client yang ingin membuat aplikasinya
              </P>
             
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                  <span class="block uppercase text-white text-sm font-semibold mb-2">Menu</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">About</a>
                    </li>
                    <li>
                      <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">Project</a>
                    </li>
                    <li>
                      <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">Social Media</a>
                    </li>
               
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-white text-sm font-semibold mb-2">Social Media</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">Facebook</a>
                    </li>
                    <li>
                        <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">Instagram</a>
                    </li>
                    <li>
                        <a class="text-white hover:font-bold font-semibold block pb-2 text-sm" href="">Linkedin</a>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-6 ">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
              <div class="text-sm text-white font-semibold py-1">
                Copyright © <span id="get-current-year">2024</span><a href="" class="text-white hover:text-gray-800" target="_blank"> Pifacia
                <a href="" class="text-white ">Test</a>.
              </div>
            </div>
          </div>
        </div>
    </footer>

@endsection