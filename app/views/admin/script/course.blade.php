
<script type="text/javascript">
	$(document).ready(function () {
		$( ".check-class" ).change(function() {
			var classId = $(this).val();
			var cardId = {{$data->id}}
			if($("#class-" + classId).is(':checked')) {
				getCourseByClass("#config-course", classId, cardId);
			} else {
				$("#course-class-" + classId).remove();
			}
	    }).change();
	    
	});
	
    function getCourseByClass(el, courseId, cardId) {
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/admin_card/card/course/' + courseId + '/' + cardId,
            success: function(response){
                $(el).append(response);
            }
        });
	}

</script>