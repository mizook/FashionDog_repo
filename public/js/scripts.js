function ConfirmationPopUp(formName)
{
    const Form = document.getElementById(formName);
    Form.addEventListener("click", function(event){event.preventDefault()})

    swal({
        title: "¿Estás seguro?",
        icon: "warning",
        buttons: ["No", true],
      })
      .then((willDelete) => {
        if (willDelete) {
            Form.submit();
        }
      });
}

function DisableUserPopUp()
{
    swal({
        title: "¿Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
}
