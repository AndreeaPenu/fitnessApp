$( document ).ready(function() {
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }
    
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }
});

$(document).ready(function() {

    $('select[name="workouts[]"]').on('change', function(e){
        var workoutId = e.target.value;
        if(workoutId) {
            $.ajax({
                url: '/admin/plans/create/'+workoutId,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="exercises[]"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="exercises[]"]').append('<option value="'+ key +'">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="exercises[]"]').empty();
        }
        });

    });