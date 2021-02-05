<script>
    $(function(){
        $(document).ready(function(){
            // Browse
            $(document).on('change','#browse',function(){
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission,flag_data,1);
            });
            // Read
            $(document).on('change','#read',function(){
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission,flag_data,2);
            });
            // Edit
            $(document).on('change','#edit',function(){
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission,flag_data,3);
            });
            // Add
            $(document).on('change','#add',function(){
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission,flag_data,4);
            });
            // Delete
            $(document).on('change','#delete',function(){
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission,flag_data,5);
            });

            // Permission AJAX Function
            function updatePermission(permission,flag_data,permission_type)
            {
                let url = '/admin/change_role_module_permission';
                $.ajax({
                   url: url.trim(),
                   type: "PATCH",
                   cache: false,
                   data:{
                   _token:'{{ csrf_token() }}',
                   flag: flag_data,
                   permission: permission,
                   type: permission_type
                },
                   success: function(dataResult){
                   dataResult = JSON.parse(dataResult);
                   if(dataResult.statusCode)
                   {
                      toastr.success(dataResult.success);
                   }
                   else{
                      alert("Internal Server Error");
                   }
                 }
                });
            }
        });
    });
</script>