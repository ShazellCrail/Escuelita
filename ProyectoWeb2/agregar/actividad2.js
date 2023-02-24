const form = document.getElementById('form')
const button = document.getElementById('submitButton')

const respuesta1 = document.getElementById('res_1')
const respuesta2_1 = document.getElementById('res_2_1')
const respuesta2_2 = document.getElementById('res_2_2')
const respuesta3_1 = document.getElementById('res3_1')
const respuesta3_2 = document.getElementById('res3_2')
const respuesta3_3 = document.getElementById('res3_3')
const respuesta3_4 = document.getElementById('res3_4')
const respuesta4 = document.getElementById('res_4')

const clearFields = () => {
    for(const key of Object.keys(formIsValid)) {
        document.getElementById(`${key}`).value = null
    }
    
}

const formIsValid = {
    respuesta1: false,
    respuesta2_1: false,
    respuesta2_2: false,
    respuesta3_1: false,
    respuesta3_2: false,
    respuesta3_3: false,
    respuesta3_4: false
}

form.addEventListener('submit', (e) => {
    e.preventDefault()
    validateForm()
})

respuesta1.addEventListener('change', (e) => {
    if(e.target.value.trim().length > 0){
        formIsValid.respuesta1 = true
    }
})

respuesta2_1.addEventListener('change', (e) => {
    if(e.target.value.trim().length > 0){
        formIsValid.respuesta2_1 = true
    }
})

respuesta2_2.addEventListener('change', (e) => {
    if(e.target.value.trim().length > 0){
        formIsValid.respuesta2_2 = true
    }
})


respuesta3_1.addEventListener('change', (e) => {
    if(e.target.checked == true){
        formIsValid.respuesta3_1 = true
    }
})

respuesta3_2.addEventListener('change', (e) => {
    if(e.target.checked == true){
        formIsValid.respuesta3_2 = true
    }
})

respuesta3_3.addEventListener('change', (e) => {
    if(e.target.checked == true){
        formIsValid.respuesta3_3 = true
    }
})

respuesta3_4.addEventListener('change', (e) => {
    if(e.target.checked == true){
        formIsValid.respuesta3_4 = true
    }
})

respuesta4.addEventListener('change', (e) => {
    if(e.target.value.trim().length > 0){
        formIsValid.respuesta4 = true
    }
})

const validateForm = () => {
    const formValues = Object.values(formIsValid)
    const valid = formValues.findIndex(value => value == false)
    if(valid == -1) {
        form.submit()
    }else{
        alert('Form invalid')
    }
}

clearFields()