$(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
});

window.addEventListener("hide-form", (event) => {
  $("#form").modal("hide");
  toastr.success(event.detail.message, "Success!");
});

window.addEventListener("show-form", (event) => {
  $("#form").modal("show");
});

window.addEventListener("show-delete-modal", (event) => {
  $("#confirmationModal").modal("show");
});

window.addEventListener("hide-delete-modal", (event) => {
  $("#confirmationModal").modal("hide");
  toastr.success(event.detail.message, "Success!");
});

window.addEventListener("alert", (event) => {
  toastr.error(event.detail.message, "Success!");
});

window.addEventListener("updated", (event) => {
  toastr.success(event.detail.message, "Success!");
});

$('[x-ref="profileLink"]').on("click", function () {
  localStorage.setItem("_x_currentTab", '"profile"');
});
$('[x-ref="changePasswordLink"]').on("click", function () {
  localStorage.setItem("_x_currentTab", '"changePassword"');
});

$("#form").on("shown.bs.modal", function () {
  setTimeout(function () {
    $("#nombre").focus();
  }, 100);
});
