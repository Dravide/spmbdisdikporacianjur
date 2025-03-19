<html>
<link rel='stylesheet' href=' {{asset('assets/libs/sweetalert2/sweetalert2.min.css')}} '/>
<script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>
<style>
    body{
        font-family: 'Be Vietnam Pro', sans-serif;
    }
</style>
<script src='{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}'></script>
<script type='text/javascript'>
    $(document).ready(function () {
        Swal.fire({
            icon: 'error',
            title: 'Berkas Tidak Valid',
            text: 'Berkas tidak valid! Silahkan scan ulang atau pastikan berkas benar-benar asli!',
            showConfirmButton: 1,
            confirmButtonText: 'Kembali!'
        }).then(function () {
            window.location = '{{route('myhome')}}';

        })
    });



</script>
</html>
