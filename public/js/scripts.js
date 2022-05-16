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
