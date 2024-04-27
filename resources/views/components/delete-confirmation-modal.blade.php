<div>
    <script>
        function deleteItem(route, itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                position: 'top-end'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: route + '/' + itemId,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            window.location.reload();
                            console.log(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        }
    </script>
</div>