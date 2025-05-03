
$(document).ready(function () {

    let output = $("#output");

    $(document).on("click", "input", function (e) {

        let el = output[0];
        el.scrollLeft = el.scrollWidth;

        var button = $(this);
        var value = button.val();

        let appendStrings = output.val(replaceDoubleOperator(output.val() + value));


        if (value == 'c')
            output.val('');

        try {

            if (value == '=') {
                let answer = eval(appendStrings.val().slice(0, -1));
                output.val(answer);
            }

        } catch (e) {

            output.val('Syntax Error')
            setTimeout(clear, 700);

        }

        function replaceDoubleOperator(input) {
            if (input.includes('--'))
                return input.replace(/\-{2,}/g, '-');
            if (input.includes('++'))
                return input.replace(/\+{2,}/g, '+');
            if (input.includes('**'))
                return input.replace(/\*{2,}/g, '*');
            if (input.includes('//'))
                return input.replace(/\/{2,}/g, '/');
            return input;
        }

    });

    function clear() {
        output.val('');
    }




});