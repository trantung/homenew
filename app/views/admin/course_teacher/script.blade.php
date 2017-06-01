<script>

$( "#subject_id" ).change( function(){
	$('#teacher_id').empty();
	var id = $('#subject_id').val();
	$.ajax({
		type: 'GET',
		url: '/manager/homenew/public/admin/subjectteacher/teacher/'+id,
		success: function(response){
			console.log('response', response);
			$('#teacher_id').append('<option value="" >Chọn</option>');
			$.each(response ,function(index, value){
				$('#teacher_id').append('<option value="'+ index+'" >'+value+'</option>');
			});
		}
	});
});

</script>