
<script>
  function p_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dikirim!'

      })
  }

  function p_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Data gagal dikirim!'

      })
  }

  function e_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dirubah!'

      })
  }

  function e_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Data gagal dirubah!'

      })
  }

  function h_berhasil(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus!'

      })
  }

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

  function i_gagal(){

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Email atau password yang anda masukan salah!'

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
        title: 'Anda berhasil logout!'

      })
  }
</script>