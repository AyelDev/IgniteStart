// AJAX REQUESTS

async function sendRequest(jsonData, url, method) {
    try {
        const response = await new Promise((resolve, reject) => {
            $.ajax({
                type: method,
                url: url,
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function (response) {
                    resolve(response);
                },
                error: function (xhr, status, error) {
                    reject(xhr.responseJSON || { error: error });
                }
            });
        });
        return response;
    } catch (error) {
        return error;
    }
}

// END AJAX REQUESTS

// TOASTR JS [NOTIFICATION JS]

 // Optional: Customize toastr settings
   toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": true,
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

    // Notification functions
    function showSuccess(title = 'Success', message) {
      toastr.success(title , message);
    }

    function showError(title = 'Error', message) {
      toastr.error(title, message);
    }

    function showInfo(title = 'Info', info) {
      toastr.info(title , info);
    }

    function showWarning(title = 'Warning', warning) {
      toastr.warning(title, warning);
    }


    // waitMe Js loader
    function loadForm(formid = '', effect, text = '') {
        $(formid).waitMe({
        effect: effect,
        text: text,
        bg: 'rgba(114, 88, 161, 0.95)',
        color:'rgb(255, 255, 255)',
        maxSize: '',
        waitTime: -1,
        textPos: 'vertical',
        fontSize: '20px',
        source: '',
        onClose: function () {}
      });
    }