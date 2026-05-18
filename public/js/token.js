const tokenInputs = document.querySelectorAll('.authVerify__card__token input');

tokenInputs.forEach((input, index) => {

    input.addEventListener('input', () => {
        if (input.value.length === 1 && index < tokenInputs.length - 1) {
            tokenInputs[index + 1].focus();
        }
    });

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && input.value === '' && index > 0) {
            tokenInputs[index - 1].focus();
        }
    });

    input.addEventListener('paste', (e) => {
        e.preventDefault();
        const text = e.clipboardData.getData('text').trim();
        if (text.length === 6) {
            tokenInputs.forEach((inp, i) => {
                inp.value = text[i] || '';
            });
            tokenInputs[5].focus();
        }
    });
});