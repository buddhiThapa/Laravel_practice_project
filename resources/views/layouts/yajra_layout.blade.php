@include('darkpan_theme.yajra_section.header')

@include('layouts.DarkPan_section.sidebar')

<!-- Content Start -->
<div class="content">
    @include('layouts.DarkPan_section.navbar')
    @include('layouts.DarkPan_section.flash-message')
    @yield('content')
    @include('layouts.DarkPan_section.footer')
</div>
<!-- Content End -->

<!-- Extra Script for all page start-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.theme_pages_bt').click(function(){
        $('.theme_pages').toggle();
    });

    //for the Add Skill  start
    $('.skill-input').keyup(function(){
        if($(this).val().length > 0){
            $('.add-more').prop( "disabled", false );
        }else{
            $('.add-more').prop( "disabled", true );
        }
    });
    
    $(".add-more").click(function(){ 
        var  skill = $('.skill-input').val();
        $(".skills-div").append("<div class='d-flex align-items-center border-bottom py-2 after-add-more'><div class='w-100 ms-3 after-add-more'><div class='d-flex w-100 align-items-center justify-content-between'><span>"+skill+"</span><button class='btn btn-sm remove'><i class='fa fa-times'></i></button></div></div><input type='hidden' name='work_on[]' value='"+skill+"'></div>");
        $(this).prop( "disabled", true );
        $('.skill-input').val('');
    });

    //for the remove
    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
    //for the Add Skill End

</script>

<!-- Extra Script for all page End-->


{{-- @include('layouts.DarkPan_section.script') --}}