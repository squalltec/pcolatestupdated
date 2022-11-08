 <h1 onclick='ab()'></h1>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


  Swal.fire({
  title: 'Do you want Transfer?',
  showDenyButton: true,
 
  confirmButtonText: 'Yes',
  denyButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.replace("flights2.php");
  } else {
  window.location.replace('payment.php');
  }
})
  
</script>