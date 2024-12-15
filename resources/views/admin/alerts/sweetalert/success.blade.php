@if(session('swal-success'))

    <script>
      const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
          }
      });
      Toast.fire({
          icon: "success",
          text: '{{ session('swal-success') }}',
      });
    </script>

@endif