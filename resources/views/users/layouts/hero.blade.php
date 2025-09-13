<div class="container-fluid relative">
    <div class="profile-banner relative text-transparent">
        <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)"/>
        <div class="relative shrink-0">
            <img src="{{asset('assets/images/blog/bg.jpg')}}" class="h-80 w-full object-cover" id="profile-banner" alt="">
            <div class="absolute inset-0 bg-black/70"></div>
            <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
        </div>
    </div>
</div><!--end container-->
