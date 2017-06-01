<script type="text/javascript">
	$(document).ready(function () {



	//botton
		$('#teacheridChoose').on('hidden.bs.select', function (e) {
  			var id = $('#teacheridChoose').val();
  			if (id) {
  				getSubject("#subjectIdChoose", id);
  			}
		});


		$('#teacher_id').on('hidden.bs.select', function (e) {
  			var id = $('#teacher_id').val();
  			if (id) {
  				getSubject("#subjectId", id);
			}
		});

		$('#subjectId').on('hidden.bs.select', function (e) {
			var id = $('#subjectId').val();
			var teacherId = $('#teacher_id').val();
			if (id) {
				getCourse("#courseId", id, {{ $class }}, teacherId);
			}
			
		}); 

		$('#subjectIdChoose').on('hidden.bs.select', function (e) {
			var id = $('#subjectIdChoose').val();
			var teacherId = $('#teacheridChoose').val();
			if (id) {
				getCourse("#courseIdChoose", id, {{ $class }}, teacherId);
			}
		});

/*		$('#courseId').on('hidden.bs.select', function (e) {
			var id = $('#courseId').val();
			var package = $(this).find('option[value="'+ id +'"]').data('package');
			var groupid = $(this).find('option[value="'+ id +'"]').data('groupid');
			if(package > 0 && groupid > 0){
				var link = '/package/?groupid='+groupid+'&packageid='+package;

				$('#regMyCourse').attr('href', link);
			}

		});*/
        $('#courseId').change(function(){
		    var $option = $(this).find('option:selected'),
		        $package = $option.data('package'),
		        $group = $option.data('groupid');

            $('#course_filter_groupid_1').val($group);
            $('#course_filter_package_id_1').val($package);
		});

		$('#courseIdChoose').change(function(){
		    var $option = $(this).find('option:selected'),
		        $package = $option.data('package'),
		        $group = $option.data('groupid');

            $('#course_filter_groupid').val($group);
            $('#course_filter_package_id').val($package);
		});
/*
		$('#courseIdChoose').on('hidden.bs.select', function (e) {

			var id = $('#courseIdChoose').val();
			var package = $(this).find('option[value="'+ id +'"]').data('package');
			var groupid = $(this).find('option[value="'+ id +'"]').data('groupid');
			if(package > 0 && groupid > 0){
				var link = '/package/?groupid='+groupid+'&packageid='+package;
				$('#regMyCourseChoose').attr('href', link);
			}
			
		}); */
		//register.blade.php
		$('#select-subject').on('change', function (e) {
  			var id = $('#select-subject').val();
  			if (id) {
				getTeacher("#select-teacher", id, {{ $class }});
			}
		}); 

		$('#select-teacher').on('hidden.bs.select', function (e) {
  			var subjectId = $('#select-subject').val();
			var teacherId = $('#select-teacher').val();
			if (subjectId) {
				getCourse("#course_id", subjectId, {{ $class }}, teacherId);
			}
		});

		//end register.blade.php
		
		$('#subject_id_2').on('hidden.bs.select', function (e) {
			var id = $('#subject_id_2').val();
			if (id) {
				getCourseBySubject("#course_id_2", id, {{ $class }});
			}
			
		}); 

		$('#select-teacher').on('hidden.bs.select', function (e) {
  			var subjectId = $('#select-subject').val();
			var teacherId = $('#select-teacher').val();
			if (subjectId) {
				getCourse("#course_id_2", subjectId, {{ $class }}, teacherId);
			}
		});

		//choosecourse.blade.php
		$('#subject_id').on('hidden.bs.select', function (e) {
            var subjectId = $('#subject_id').val();
            console.log("subjectId", subjectId);
            if (subjectId) {
                getTeacher("#teacher_select", subjectId, {{ $class }});
            }
        }); 
		$('#teacher_select').on('hidden.bs.select', function (e) {
            var teacherId = $(this).val();
            var subjectId = $('#subject_id').val();
            if (teacherId) {
                getCourse("#course_id", subjectId, {{ $class }}, teacherId);
            }
        }); 
		//end choosecourse.blade.php

		//choosecoursesecond.blade.php
		$('#subject_id_2').on('hidden.bs.select', function (e) {
            var subjectId = $('#subject_id_2').val();
            if (subjectId) {
                getTeacher("#teacher_id_2", subjectId, {{ $class }});
            }
        }); 
		$('#teacher_id_2').on('hidden.bs.select', function (e) {
            var teacherId = $(this).val();
            var subjectId = $('#subject_id_2').val();
            if (teacherId) {
                getCourse("#course_id_2", subjectId, {{ $class }}, teacherId);
            }
        }); 
		//end choosecourse.blade.php
	});

	function getCourse(el, id, classId, teacherId) {
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/frontend/listcourse/' + id + '/' + classId + '/' + teacherId,
            success: function(response){
                var html = '';
                    html += '<option value="" >Chọn khóa học</option>';
					$.each(response ,function(index, value){
						html += '<option value="'+ value.id+'" data-package="'+value.packageid+'" data-groupid="'+ value.groupid +'">'+value.fullname+'</option>';
					});
					$(el).html(html);
					$(el).selectpicker('refresh');
            }
        });
	}

	function getSubject(el, id) {
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/frontend/listsubject/' + id,
            success: function(response){
            	if(response != null){                
                    var html = '';
                    html += '<option value="" >Chọn môn</option>';

					$.each(response ,function(index, value){
						html += '<option value="'+ index+'" >'+value+'</option>';
					});

					$(el).html(html);
					$(el).selectpicker('refresh');
            	}
            }
        });
	}

	function getTeacher(el, id, classId) {
		console.log("classId", classId);
		console.log("id", id);
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/frontend/subject/' + id + '/'+ classId,
            success: function(response){
            	if(response != null){                
                    var html = '';
                    html += '<option value="" >Chọn giáo viên</option>';
					$.each(response ,function(index, value){
						html += '<option value="' + index + '" >' + value + '</option>';
					});
					$(el).html(html);
					$(el).selectpicker('refresh');
            	}
            }
        });
	}

	function getCourseBySubject(el, id, classId) {
		$.ajax({
            type: "GET",
            url: '/manager/homenew/public/api/json/course-by-subject/' + id + '/' + classId ,
            success: function(response){
                var html = '';
                    html += '<option value="" >Chọn khóa học</option>';
					$.each(response ,function(index, value){
						html += '<option value="'+ value.id+'" data-package="'+value.packageid+'" data-groupid="'+ value.groupid +'">'+value.fullname+'</option>';
					});
					$(el).html(html);
					$(el).selectpicker('refresh');
            }
        });
	}

</script>