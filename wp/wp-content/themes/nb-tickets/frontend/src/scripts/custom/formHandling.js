let form

const state = {
    valid: false,
}

// proxy(as a listener) for state
const stateProxy = new Proxy(state, {
    set: function (t, k, v) {
        if(k === "valid" && v) {
            t[k] = v
            uTils.btnDisabler(!v)
        }
   },
})

const errors = {
    pw_match: false,
    em_valid: false,
    form_filled: false
}

//proxy(as a listener) for errors
const errorProxy = new Proxy(errors, {
    set: function (t, k, v) {
        if(k === "em_valid") {
            uTils.emailErrorMsg(v)
        }
        if(k === "pw_match") {
            uTils.pwErrorMsg(v)
        }
        t[k] = v
        if(Object.keys(t).every(function(key)
            { return t[key] === true })
          ) {
            stateProxy.valid = true
        }
    },
})

const uTils = {
    btnDisabler: function(val){
        let submit = form.querySelector('button.btn.submit')
        submit.disabled = val
    },
    emailErrorMsg: function(val){
        let emailError = document.getElementById("email-error")
        if(!val && !emailError){
            let emailInput = form.querySelector('input[type=email]')
            let errorSpan = document.createElement('span')
            errorSpan.innerHTML = "Email address not valid"
            errorSpan.setAttribute("id", "email-error")
            errorSpan.classList.add("helper-text")
            errorSpan.classList.add("red-text")
            emailInput.after(errorSpan)
            return
        }
        if(val && emailError) {
            emailError.outerHTML = ""
        }
    },
    pwErrorMsg: function(val){
        let pwError = document.getElementById("pw-error")
        if(!val && !pwError){
            let pwInput = form.querySelector('input[type=password]')
            let errorSpan = document.createElement('span')
            errorSpan.innerHTML = "Passwords do not match"
            errorSpan.setAttribute("id", "pw-error")
            errorSpan.classList.add("helper-text")
            errorSpan.classList.add("red-text")
            pwInput.after(errorSpan)
            return
        }
        if (val && pwError) {
            pwError.outerHTML = ""
        }
}
}

const formHandler = {
    init: function() {
        if(form){
            uTils.btnDisabler(true)
            this.validatePasswordWatcher()
            this.validateEmailWatcher()
            this.fillCheckInit()
        }
    },
    validatePasswordWatcher: function(){
        let passWords = form.querySelectorAll('input[type=password]')
        if(passWords.length > 0){ // eh, really hackey until i spend more than a fleeting moment figuring out how to compare n number of values in an array
            let pwValues = []
            passWords.forEach((pwInput, index) => {
                pwInput.addEventListener("keyup", (e) => {
                    pwValues[index] = pwInput.value
                    errorProxy.pw_match = this.validatePassword(pwValues)
                })
            })
        } else {
            errorProxy.pw_match = true
        }
    },
    validatePassword: function(passWords){
        return ( passWords[0] ) === ( passWords[1] )
    },
    validateEmailWatcher: function(){
        let emailInputs = form.querySelectorAll('input[type=email')
        if(emailInputs.length > 0) {
            emailInputs.forEach((input, index) => {
                input.addEventListener("keyup", (e) => {
                    errorProxy.em_valid = this.validateEmail(input.value)
                })
            })
        }
    },
    validateEmail: function (email) {
        if (email.match(
          /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
            return true
        }
        return false
    },
    fillCheckInit: function () {
        let fields = form.querySelectorAll('[required]')
        if(fields.length > 0){
            this.fillLoopChecker(fields)
            fields.forEach((input, index) => {
                input.addEventListener("keyup", (e) => {
                    this.fillLoopChecker(fields)
                })
            })
        }
    },
    fillLoopChecker: function(fields){
        let filled = false
        for (let i = 0; i < fields.length; i++){
            if(!fields[i].checkValidity()){
                return
            }
            filled = fields[i].checkValidity()
        }
        errorProxy.form_filled = filled
    }
}

const reDirect = {
    checkForRedirect: function(){
        let redirectSpan = document.querySelector('#form_redirect')
        if(redirectSpan){
            window.location.replace(redirectSpan.dataset.redirectUrl)
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('form validation starting...')
    reDirect.checkForRedirect()
    form = document.querySelector('form')
    formHandler.init()
}, false);
