


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('DarkPan/lib/chart/chart.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/easing/easing.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/waypoints/waypoints.min.js') }} "></script>
<script src="{{ url('DarkPan/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ url('DarkPan/js/main.js') }}"></script>

<!-- Side Bar Javascript -->

<script>
    $('.theme_pages_bt').click(function(){
        $('.theme_pages').toggle();
    })
    
    
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
</body>

</html>