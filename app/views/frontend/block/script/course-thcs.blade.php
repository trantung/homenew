
<script type="text/javascript">
	$(document).ready(function () {
	    $('#choice-subject').on('change', function (e) {
	        var id = $('#choice-subject').val();
	        if (id) {
	            getCourseBySubject("#content-course", id, {{ $class }}, {{ $menuId }});
	        } else {
	        	$("#course-render").remove();
                $("#content-course").append({{$listCourse}});
	        }
	    });
	});
	
    function getCourseBySubject(el, id, classId, menuId) {
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/frontend/subject/' + id + '/class/' + classId + '/menu/' + menuId,
            success: function(response){
            	$("#course-render").remove();
                $(el).append(response);
            }
        });
	}    
</script>