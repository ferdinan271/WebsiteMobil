const Toast = Swal.mixin({
  toast: true,
  position: 'top-right',

  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true
});

function showToast(type, message) {
  Toast.fire({
    icon: type,
    title: message
  });
}

function SignOutDialog(){ 
  return Swal.fire({
    title: 'Are you sure?',
    text: "Are you sure you want to sign out? Your session will be securely terminated.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
  }).then((result) => {
    return result;
  })
}
function ConfirmDelete(email){ 
  return Swal.fire({
    title: 'Are you sure?',
    text: "Are you sure you want to delete user with email '"+email+"'?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
  }).then((result) => {
    // if (result.isConfirmed) {
    //   window.location.href = 'proses.php?action=delete&email='+email;
    // }
    return result;
  })
}
