// alert('PORRA');

console.log('MAIN JS FUNCIONANDO!');

console.log(site.baseUrl);

console.log(site.api);


function sendForm(event) {
    event.preventDefault;

    let formId = event.target.parentElement.id;

    let name = document.getElementsByName('form.nome')[0];
    let email = document.getElementsByName('form.email')[0];
    let telefone = document.getElementsByName('form.telefone')[0];

    console.log(name);

    axios.post(site.api + 'form', {
        title: name.value,
        telefone: telefone.value,
        email: email.value
    })
    .then(function (response) {
       console.log(response);
    })
    .catch(function (error) {
       console.log(error);
    });
}