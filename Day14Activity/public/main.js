$(document).ready(function(){
   $('#sgnup-username').on('input', function() {
        let pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\:;"'<>,.?/]).+$/;
        var inpVal = $(this).val();
        var inpLength = $(this).val().length;

        pattern.test(inpVal);
       
        if(inpLength == 0){
                $('#userVal').text('');
        }else if (!pattern.test(inpVal) || inpLength < 5 ) {
            $('#userVal').text('Username must be at least 5 characters and contain a letter, number, and symbol. ').removeClass().addClass('weak');
        }
        else {
            $('#userVal').text('OK').removeClass().addClass('strong');
        }
    });

    $('#sgnup-password').on('input', function() {
        
        var inpLength = $(this).val().length;
        if(inpLength === 0){
            $('#passVal').text('').removeClass()
        }else if(inpLength < 6){
            $('#passVal').text('atleast 6 characters').removeClass().addClass('weak');
        } 
        else if(inpLength < 8) {
            $('#passVal').text('weak').removeClass().addClass('weak');
        } else if(inpLength < 11) {
            $('#passVal').text('fair').removeClass().addClass('fair');
        } else {
            $('#passVal').text('strong').removeClass().addClass('strong');
        }
        // $('#passVal').text('' + inputValue);
    });
});