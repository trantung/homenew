<script type="text/javascript">
	$(document).ready(function () {
		// $('#subject_id_choose').on('hidden.bs.select', function (e) {
        $('#subject_id_choose').change(function(){
			var id = $('#subject_id_choose').val();
            if (id) {
                $.ajax({
                    type: "GET",
                    url: '/manager/homenew/public/frontend/listCourseFree/'+id+'/'+{{ $class }},
                    success: function(response){
                        console.log("response", response);
                        $('#listcoursefree li').first().nextAll().remove();
                        $("#listcoursefree").append(response);
                    }
                });
            } else {
                $.ajax({
                    type: "GET",
                    url: '/manager/homenew/public/frontend/block/trial-course-default/'+{{ $class }},
                    success: function(response){
                        $('#listcoursefree li').first().nextAll().remove();
                        $("#listcoursefree").append(response);
                    }
                });
            }
		});
	});
</script>