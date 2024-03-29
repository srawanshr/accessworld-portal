$(document).ready(function (e) {
  toastr.options = {
    closeButton: true,
    progressBar: false,
    debug: false,
    positionClass: 'toast-top-right',
    showDuration: 330,
    hideDuration: 330,
    timeOut: 5000,
    extendedTimeOut: 1000,
    showEasing: 'swing',
    hideEasing: 'swing',
    showMethod: 'slideDown',
    hideMethod: 'slideUp'
  }

  if(successMsg) { toastr.success(successMsg, ''); }

  if(infoMsg) { toastr.info(infoMsg, ''); }

  if(warningMsg) { toastr.warning(warningMsg, ''); }

  if(dangerMsg) { toastr.error(dangerMsg, ''); }

  if(errorMsg) { toastr.warning(errorMsg, ''); }
});