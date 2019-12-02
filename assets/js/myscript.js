const flashData = $('.flash-data').data('flashdata');

if(flashdata){
    swal({
        title : 'Data event ',
        text : 'Berhasil ' + flashData,
        type : 'success'
    });
}

// delete-button
$('.tombol-hapus').on('click', function (e)
{
    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
      })
})