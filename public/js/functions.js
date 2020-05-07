
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': csrf
    }

});



function confirmMessage()
{

    document.querySelectorAll('.card-body').forEach((card) =>
    {

        card.addEventListener('click', function (e)
        {

            if (e.target.className.includes('btn-outline-danger'))
            {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) =>
                {
                    if (result.value)
                    {
                        e.target.parentElement.submit();
                    }
                });


                e.preventDefault();
            }
        });
    })
}



function activeToggle()
{

    document.querySelectorAll('.card-body').forEach(function (card)
    {

        card.addEventListener('click', function (e)
        {

            if (e.target.className.includes("custom-control-input"))
            {


                const newsletter_id = e.target.parentElement.getAttribute('data-newsletter_id');


                if (e.target.checked)
                {

                    $.ajax({

                        type: 'PUT',

                        url: `${ newsletter_id }/activate`,
                        success: function (data)
                        {

                            notifaction(data.message);

                            $('#newsletter-table').DataTable().ajax.reload();

                        }

                    });


                } else
                {
                    $.ajax({

                        type: 'PUT',

                        url: `${ newsletter_id }/deactivate`,

                        success: function (data)
                        {
                            notifaction(data.message);

                            $('#newsletter-table').DataTable().ajax.reload();
                        }

                    });
                }
            }
        });

    });
}


function notifaction(message)
{


    toastr["info"](message);

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

}
