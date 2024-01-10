<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  function k_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Pesan berhasil dikirim!'

      })
  }

  function u_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Akun berhasil dibuat!'

      })
  }

  function uprofile_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Akun berhasil dirubah!'

      })
  }

  function k_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Pesan gagal dikirim!'

      })
  }

  function u_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Akun gagal dibuat!'

      })
  }

  function uprofile_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Password yang dimasukan salah!'

      })
  }

  function logout(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Anda berhasi logout!'

      })
  }
</script>