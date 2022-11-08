<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<label id='clickme' onclick='abc();'></label>

<script>

document.getElementById('clickme').click();



function abc(){
    Swal.fire({
  title: 'Meeting and Banquet Facilities',
  text: "Want to add Meeting and Banquet Facilities?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
  window.location.replace('addplanner.php');
  }
  else{
      window.location.replace('generalfacilities.php');
  }
})
}
</script>