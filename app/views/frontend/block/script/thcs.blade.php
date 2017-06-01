<script type="text/javascript">

    function getIdThcs(target){
        var id = target.attr('data-id');
        $.ajax({
            type: "GET",
            url: '/manager/homenew/public/frontend/listsubjectclass/'+id,
            success: function(response){
                if(response != null){
                    var html = '';
                    html += '<option value="" >Chọn chương trình</option>';
                    $.each(response ,function(index, value){
                        html += '<option value="'+ index+'" >'+value+'</option>';
                    });
                    $("#subject_id_thcs").html(html);
                    $('#subject_id_thcs').selectpicker('refresh');
                }
            }
        });
    }

    getIdThcs($('.class_id_thcs'));
	$('.class_id_thcs').click(function(){
	    getIdThcs($(this));
    });


//console.log("id", id);

    $(".choose-class li a").click(function() {
        $(this).parent().addClass('active').siblings().removeClass('active');
    });
</script>