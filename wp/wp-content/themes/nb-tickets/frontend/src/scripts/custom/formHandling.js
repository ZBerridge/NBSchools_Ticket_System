const formHandler = {
    errors: {
        pw_mismatch: 0
    },
    pwValues: [

    ],
    addListeners: function() {
        let form = document.querySelector('form')
        //let self = this
        this.validatePassword(form)
        this.formSubmit(form)
    },
    validatePassword: function(form){
        let passWords = form.querySelectorAll('input[type=password]')
        if(passWords.length > 0){
            let pwValues = []
            passWords.forEach((pwInput, index) => {
                this.pwValues.push(pwInput.value)
                pwInput.addEventListener("keydown", (e) => {
                    this.pwValues[index] = pwInput.value
                    if( ( this.pwValues[0] ) === ( this.pwValues[1] ) ){
                        this.errors.pw_mismatch = 0
                    } else {
                        this.errors.pw_mismatch = 1
                    }
                })
            });  
        }
    },
    compareValues: function(passWords){

    },
    formSubmit: function(form){
        let submit = form.querySelector('button[type=submit')
        console.log(submit)
    }
}
window.addEventListener('load', function () {
    formHandler.addListeners()
}, false);
