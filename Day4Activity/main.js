$(document).ready(function () {

    $("#loose-word-txt").on("input", function () {
        let inputText = $(this).val();
        let lowercaseOnly = inputText.match(/[a-z]/g)?.join('') || 'No loose letter';
        $("#output1").text(lowercaseOnly);
    });

    $("#nice-word-txt").on("input", function () {
        let inputText = $(this).val();
        let niceWord = inputText.replace(/nice/gi  ,'bad') || inputText.replace(/bad/gi  ,'nice');
        $("#output2").text(niceWord);
    });

    $("#date-txt").on("input", function () {
        var currentDate = new Date();

        // var year = currentDate.getFullYear();
        // var month = currentDate.getMonth();
        // var day = currentDate.getDay();

        let inputDate = $(this).val();
        var selectedDate = new Date(inputDate);
        // var yearr = selectedDate.getFullYear();

        var Age = 0;

        for (let i = selectedDate.getFullYear(); i <= currentDate.getFullYear(); i++) {
            console.log(Age++);
        }

        if(selectedDate.getMonth() < currentDate.getMonth() || selectedDate.getDay() < currentDate.getDay()){
            Age--;
        }

        if(selectedDate.getMonth() > currentDate.getMonth() || selectedDate.getDay() > currentDate.getDay()){
            Age--;
        }

        $("#output3").text('Your Age is ' + Age);
    });

}); 